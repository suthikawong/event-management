var action = null
var startDate = null
var endDate = null
var table
var deleteEventId = null
const formModalElement = document.querySelector('#form-modal')
const formModal = bootstrap.Modal.getOrCreateInstance(formModalElement)
const deleteModalElement = document.querySelector('#delete-modal')
const deleteModal = bootstrap.Modal.getOrCreateInstance(deleteModalElement)

function tableCellElement(title, data) {
  return `
  <div class="card-content-container">
    <div class="card-content-title">${title}:</div>
    <div>${data}</div>
  </div>`
}

function tableImageCellElement(image) {
  return `
  <div class="table-image-container">
    <img class="table-image" src="${image}" alt="event image">
  </div>`
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
      url: `event-management.inc.php?action=fetchData`,
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
        data: 'image',
        render: function (data, _, _, meta) {
          let image = 'assets/images/default-img.png'
          const uploadPath = meta.settings.json.uploadPath
          if (data) {
            image = `${uploadPath}/${data}`
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
        data: 'start_date',
        render: function (data) {
          return tableCellElement('Start', moment(data).format('DD/MM/YY hh:mm A'))
        },
      },
      {
        targets: 3,
        data: 'end_date',
        render: function (data) {
          return tableCellElement('End', moment(data).format('DD/MM/YY hh:mm A'))
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
              <div class="card-divider" onclick="onClickDeleteEvent(${row.event_id})"></div>
              <button class="delete-button"><i class="fa-solid fa-trash"></i></button>
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
    pageLength: 7,
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
  $('#event-form').trigger('reset')
  $('#error-message').hide()
  $('.preview-image-container').hide()
  $('.uploader-container').show()

  // reset datepicker to initial value
  const start = moment().startOf('hour')
  const end = moment().startOf('hour').add(1, 'hour')
  setDateRangePicker(start, end)
}

// function fetchData() {
//   $.ajax({
//     url: `event-management.inc.php?action=fetchData`,
//     type: 'GET',
//     success: function (response) {
//       console.log('TLOG ~ response:', response)
//       const res = JSON.parse(response)
//       if (res.statusCode === 200) {
//         // load event row that will be insert in table
//         $.ajax({
//           url: 'components/event-row.php',
//           type: 'GET',
//           success: function (element) {
//             table.clear().draw()
//             $.each(res.data, function (_, value) {
//               let elem = element
//               const start = moment(value.start_date)
//               const end = moment(value.end_date)
//               elem = elem.replace('$event_id', value.event_id)
//               elem = elem.replace('$event_name', value.event_name)
//               elem = elem.replace('$start_date', start.format('DD/MM/YYYY'))
//               elem = elem.replace('$end_date', end.format('DD/MM/YYYY'))
//               elem = elem.replace('$time', `${start.format('H:mm')} - ${end.format('H:mm')}`)
//               elem = elem.replace('$location', value.location)
//               if (value.image) {
//                 elem = elem.replace('$image', `${res.uploadPath}/${value.image}`)
//               } else {
//                 elem = elem.replace('$image', 'assets/images/default-img.png')
//               }
//               table.row.add($(elem)).draw()
//             })
//           },
//         })
//       } else {
//         $('.toast').toast('hide')
//         $('.toast-body').text(res.message)
//         $('.toast').toast('show')
//       }
//     },
//   })
// }

function fetchDataById($eventId) {
  $.ajax({
    url: `event-management.inc.php?action=fetchById&id=${$eventId}`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        const data = res.data
        $('#event-form input[name=id]').val(data.event_id)
        $('#event-form input[name=event]').val(data.event_name)
        $('#event-form textarea[name=description]').val(data.description)
        $('#event-form input[name=location]').val(data.location)
        if (data.image) {
          $('#event-form .uploader-container').hide()
          $('#event-form .preview-image-container').show()
          $('#event-form .preview-image').attr('src', `${res.uploadPath}/${data.image}`)
        }
        const start = moment(data.start_date)
        const end = moment(data.end_date)
        setDateRangePicker(start, end)
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
  formData.append('startDate', startDate)
  formData.append('endDate', endDate)

  $.ajax({
    url: `event-management.inc.php?action=${action}`,
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

function confirmDeleteEvent() {
  $('#delete-modal .delete-button').attr('disabled', 'disabled')
  $.ajax({
    url: `event-management.inc.php?action=deleteData`,
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
  $('#event-form .uploader-container').show()
  $('#event-form .preview-image-container').hide()
}

function onSearch() {
  table.ajax.reload()
}

$(document).ready(function () {
  showDataTable()
  resetForm()

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
  $('#delete-modal .delete-button').click(confirmDeleteEvent)
})
