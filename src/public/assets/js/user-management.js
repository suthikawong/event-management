var action = null
var startDate = null
var endDate = null
var table
var deleteUserId = null
const formModalElement = document.querySelector('#form-modal')
const formModal = bootstrap.Modal.getOrCreateInstance(formModalElement)
const deleteModalElement = document.querySelector('#delete-modal')
const deleteModal = bootstrap.Modal.getOrCreateInstance(deleteModalElement)

function showDataTable() {
  table = new DataTable('#user-table', {
    layout: {
      topStart: null,
      topEnd: null,
      bottomStart: 'info',
      bottomEnd: 'paging',
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: `user-management.inc.php?action=fetchData`,
      type: 'GET',
      data: function (param) {
        param.keyword = $('#search-keyword').val()
      },
      dataSrc: function (res) {
        if (res.statusCode === 200) {
          return res.data
        }
        $('.toast').toast('hide')
        $('.toast-body').text(res.message)
        $('.toast').toast('show')
      },
    },
    columnDefs: [
      {
        targets: 0,
        data: 'name',
        render: function (_, _, row) {
          return tableCellElement('Name', `${row.first_name} ${row.last_name}`)
        },
      },
      {
        targets: 1,
        data: 'username',
        render: function (data) {
          return tableCellElement('Username', data)
        },
      },
      {
        targets: 2,
        data: 'email',
        render: function (data) {
          return tableCellElement('Email', data)
        },
      },
      {
        targets: 3,
        data: 'is_admin',
        render: function (data) {
          return tableCellElement('Permission', data ? 'Admin' : 'User')
        },
      },
      {
        targets: 4,
        data: null,
        render: function (_, _, row) {
          return `
            <div class="card-action-container">
              <button class="edit-button" onclick="onClickEditUser(${row.user_id})"><i class="fa-solid fa-pen"></i></button>
              <div class="card-divider"></div>
              <button class="delete-button" onclick="onClickDeleteUser(${row.user_id})"><i class="fa-solid fa-trash"></i></button>
            </div>
            <div class="table-action-container">
              <button onclick="onClickEditUser(${row.user_id})" class="app-button sm outline-primary edit-button">Edit</button>
              <button onclick="onClickDeleteUser(${row.user_id})" class="app-button sm outline-danger delete-button">Delete</button>
            </div>
          </div>`
        },
      },
    ],
    paging: true,
    pageLength: 10,
  })
}

function onImageChange() {
  const file = $($(this))[0].files[0]
  const url = URL.createObjectURL(file)
  $('.uploader-container').hide()
  $(this).closest('.form-item').find('.preview-image').attr('src', url)
  $('.preview-image-container').show()
}

function setDateRangePicker(start, end) {
  startDate = start.format('YYYY-MM-DDTHH:mm:ss')
  endDate = end.format('YYYY-MM-DDTHH:mm:ss')
  $('input[name="duration"]').daterangepicker(
    {
      timePicker: true,
      drops: 'up',
      startDate: start,
      endDate: end,
      locale: {
        format: 'DD/MM/YYYY H:mm',
      },
    },
    function (start, end) {
      startDate = start.format('YYYY-MM-DDTHH:mm:ss')
      endDate = end.format('YYYY-MM-DDTHH:mm:ss')
    }
  )
}

function resetForm() {
  // clear form
  $('#user-form').trigger('reset')
  $('#error-message').hide()
  $('.preview-image-container').hide()
  $('.uploader-container').show()
  $('#user-form input[name=isAdmin]').removeAttr('checked')

  // reset datepicker to initial value
  const start = moment().startOf('hour')
  const end = moment().startOf('hour').add(1, 'hour')
  setDateRangePicker(start, end)
}

function fetchDataById($userId) {
  $.ajax({
    url: `user-management.inc.php?action=fetchById&id=${$userId}`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        const data = res.data
        $('#user-form input[name=id]').val(data.user_id)
        $('#user-form input[name=username]').val(data.username)
        $('#user-form input[name=email]').val(data.email)
        $('#user-form input[name=firstName]').val(data.first_name)
        $('#user-form input[name=lastName]').val(data.last_name)
        if (data.is_admin) {
          $('#user-form input[name=isAdmin]').attr('checked', true)
        }
      } else {
        $('.toast').toast('hide')
        $('.toast-body').text(res.message)
        $('.toast').toast('show')
      }
    },
  })
}

function onSubmitForm() {
  if (!action) return

  $('.submit-button').attr('disabled', 'disabled')
  const formData = new FormData($('#user-form')[0])
  formData.set('isAdmin', formData.get('isAdmin') === '' ? true : false)

  $.ajax({
    url: `user-management.inc.php?action=${action}`,
    type: 'POST',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      try {
        const res = JSON.parse(response)
        if (res.statusCode === 200) {
          $('#error-message').hide()
          formModal.hide()
          table.ajax.reload()
        } else {
          $('#error-message').text(res.message)
          $('#error-message').show()
        }
      } catch (e) {
        console.error(e)
      } finally {
        $('.submit-button').removeAttr('disabled')
      }
    },
  })
}

function confirmDeleteUser() {
  $('#delete-modal .delete-button').attr('disabled', 'disabled')
  $.ajax({
    url: `user-management.inc.php?action=deleteData`,
    type: 'POST',
    dataType: 'json',
    data: { id: deleteUserId },
    success: function (res) {
      try {
        if (res.statusCode === 200) {
          table.ajax.reload()
        } else {
          $('.toast').toast('hide')
          $('.toast-body').text(res.message)
          $('.toast').toast('show')
        }
      } catch (e) {
        console.error(e)
      } finally {
        $('.submit-button').removeAttr('disabled')
        deleteModal.hide()
      }
    },
  })
}

function onClickAddUser() {
  $('#form-modal .modal-title').text('Add User')
  action = 'insertData'
  formModal.show()
}

function onClickEditUser(userId) {
  $('#form-modal .modal-title').text('Edit User')
  action = 'updateData'
  formModal.show()
  fetchDataById(userId)
}

function onClickDeleteUser(userId) {
  deleteUserId = userId
  deleteModal.show()
}

function onClickDeleteImage() {
  $('#user-form input[name=image]').val('')
  $('#user-form .uploader-container').show()
  $('#user-form .preview-image-container').hide()
}

function onSearch() {
  table.ajax.reload()
}

$(document).ready(function () {
  showDataTable()
  resetForm()

  // open modal
  // $('button.add-button').click(onClickAddUser)

  // upload image
  $('input.app-image-uploader').change(onImageChange)

  // reset form
  $('#form-modal').on('hidden.bs.modal', resetForm)

  // reset uploaded image
  $('.preview-image-container > a').click(onClickDeleteImage)

  // search
  $('.search-button').click(onSearch)

  // submit form
  $('.submit-button').click(onSubmitForm)

  // delete user
  $('#delete-modal .delete-button').click(confirmDeleteUser)
})
