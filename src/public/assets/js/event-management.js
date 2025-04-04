var action = null
var date = null
var table
var deleteEventId = null
const formModalElement = document.querySelector('#form-modal')
const formModal = bootstrap.Modal.getOrCreateInstance(formModalElement)
const deleteModalElement = document.querySelector('#delete-modal')
const deleteModal = bootstrap.Modal.getOrCreateInstance(deleteModalElement)
var startDate = null
var endDate = null

function dateRangeFilter(start, end) {
  startDate = start.format('YYYY-MM-DDTHH:mm:ss')
  endDate = end.format('YYYY-MM-DDTHH:mm:ss')
  $('input[name="daterange"]').daterangepicker(
    {
      opens: 'left',
      startDate: start,
      endDate: end,
      locale: {
        format: 'DD/MM/YYYY',
      },
    },
    function (start, end) {
      startDate = start.format('YYYY-MM-DDTHH:mm:ss')
      endDate = end.format('YYYY-MM-DDTHH:mm:ss')
    }
  )
}

function showDataTable() {
  table = new DataTable('#event-table', {
    layout: {
      topStart: null,
      topEnd: null,
      bottomStart: 'info',
      bottomEnd: 'paging',
    },
    processing: true,
    serverSide: true,
    ajax: {
      url: `includes/event-management.inc.php?action=fetchData`,
      type: 'GET',
      data: function (param) {
        param.keyword = $('#search-keyword').val()
        param.startDate = startDate
        param.endDate = endDate
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
        data: 'image',
        render: function (data) {
          let image = 'assets/images/default-img.png'
          if (data) {
            image = `${uploadsPath}/${data}`
          }
          return tableImageCellElement(image)
        },
      },
      {
        targets: 1,
        data: 'event_name',
        render: function (data) {
          return tableCellElement('Event', data)
        },
      },
      {
        targets: 2,
        data: 'date',
        render: function (data) {
          return tableCellElement('Date', moment(data).format('DD/MM/YY hh:mm A'))
        },
      },
      {
        targets: 3,
        data: 'category',
        render: function (data) {
          return tableCellElement('Category', data)
        },
      },
      {
        targets: 4,
        data: 'location',
        render: function (data) {
          return tableCellElement('Location', data)
        },
      },
      {
        targets: 5,
        data: null,
        render: function (_, _, row) {
          return `
            <div class="card-action-container">
              <button class="edit-button" onclick="onClickEditEvent(${row.event_id})"><i class="fa-solid fa-pen"></i></button>
              <div class="card-divider"></div>
              <button class="delete-button" onclick="onClickDeleteEvent(${row.event_id})"><i class="fa-solid fa-trash"></i></button>
            </div>
            <div class="table-action-container">
              <button onclick="onClickEditEvent(${row.event_id})" class="app-button sm outline-primary edit-button">Edit</button>
              <button onclick="onClickDeleteEvent(${row.event_id})" class="app-button sm outline-danger delete-button">Delete</button>
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

function setDateTimePicker(start) {
  date = start.format('YYYY-MM-DDTHH:mm:ss')
  $('input[name="date"]').daterangepicker(
    {
      singleDatePicker: true,
      timePicker: true,
      drops: 'up',
      showDropdowns: true,
      minDate: moment().startOf('hour').add(1, 'hour'),
      startDate: start,
      locale: {
        format: 'DD/MM/YYYY H:mm',
      },
    },
    function (start) {
      date = start.format('YYYY-MM-DDTHH:mm:ss')
    }
  )
}

function resetForm() {
  // clear form
  $('#event-form').trigger('reset')
  $('#error-message').hide()
  onClickDeleteImage()

  // reset datepicker to initial value
  const start = moment().startOf('hour')
  setDateTimePicker(start)
}

function fetchDataById(eventId) {
  $.ajax({
    url: `includes/event-management.inc.php?action=fetchById&id=${eventId}`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        const data = res.data
        $('#event-form input[name=id]').val(data.event_id)
        $('#event-form input[name=event]').val(data.event_name)
        $('#event-form textarea[name=description]').val(data.description)
        $('#event-form input[name=category]').val(data.category)
        $('#event-form input[name=location]').val(data.location)
        if (data.image) {
          $('#event-form .uploader-container').hide()
          $('#event-form .preview-image-container').show()
          $('#event-form input[name=imageName]').val(data.image)
          $('#event-form .preview-image').attr('src', `${uploadsPath}/${data.image}`)
        } else {
          $('#event-form input[name=imageName]').val('')
        }
        const start = moment(data.date)
        setDateTimePicker(start)
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
  const formData = new FormData($('#event-form')[0])
  formData.append('date', date)

  $('.submit-button').attr('disabled', 'disabled')
  $('.submit-button').addClass('disabled')

  $.ajax({
    url: `includes/event-management.inc.php?action=${action}`,
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
        $('.submit-button').removeClass('disabled')
      }
    },
  })
}

function confirmDeleteEvent() {
  $('#delete-modal .delete-button').attr('disabled', 'disabled')
  $.ajax({
    url: `includes/event-management.inc.php?action=deleteData`,
    type: 'POST',
    dataType: 'json',
    data: { id: deleteEventId },
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

function onClickAddEvent() {
  $('#form-modal .modal-title').text('Add Event')
  action = 'insertData'
  formModal.show()
}

function onClickEditEvent(eventId) {
  $('#form-modal .modal-title').text('Edit Event')
  action = 'updateData'
  formModal.show()
  fetchDataById(eventId)
}

function onClickDeleteEvent(eventId) {
  deleteEventId = eventId
  deleteModal.show()
}

function onClickDeleteImage() {
  $('#event-form input[name=image]').val('')
  $('#event-form input[name=imageName]').val('')
  $('#event-form .uploader-container').show()
  $('#event-form .preview-image-container').hide()
}

function onSearch() {
  table.ajax.reload()
}

$(document).ready(function () {
  dateRangeFilter(moment().startOf('day'), moment().endOf('day').add(30, 'day'))
  resetForm()
  showDataTable()

  // open modal
  $('button.add-button').click(onClickAddEvent)

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

  // delete event
  // $('#delete-modal .delete-button').click(confirmDeleteEvent)
})
