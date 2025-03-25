const successModalElement = document.querySelector('#success-modal')
const successModal = bootstrap.Modal.getOrCreateInstance(successModalElement)
const failedModalElement = document.querySelector('#failed-modal')
const failedModal = bootstrap.Modal.getOrCreateInstance(failedModalElement)

function fetchDataById(eventId) {
  $.ajax({
    url: `includes/event.inc.php?action=fetchById&id=${eventId}`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        const data = res.data
        $('.event-title').text(data.event_name)
        $('.event-desc-content').text(data.description)
        $('.event-datetime-content > div:first-child > span').text(moment(data.start_date).format('DD/MM/YY hh:mm A'))
        $('.event-datetime-content > div:last-child > span').text(moment(data.end_date).format('DD/MM/YY hh:mm A'))
        $('.event-location-content').text(data.location)
        if (data.image) {
          $('.event-img').attr('src', `${res.uploadPath}/${data.image}`)
        }
      } else {
        $('.toast').toast('hide')
        $('.toast-body').text(res.message)
        $('.toast').toast('show')
      }
    },
  })
}

function onClickBack() {
  window.location.href = `${publicPath}/home`
}

function splitUrl() {
  const splitUrl = window.location.href.replace(publicPath, '').split('/')
  return splitUrl.length == 3 ? splitUrl[2] : null
}

function onClickBook() {
  if (!loginUserId) {
    window.location.href = `${publicPath}/login`
    return
  }
  $.ajax({
    url: `includes/event.inc.php?action=sendEmail`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        successModal.show()
      } else {
        failedModal.show()
      }
    },
  })
}

function onClickClose() {
  successModal.hide()
  failedModal.hide()
}

$(document).ready(function () {
  const eventId = splitUrl()
  if (eventId) {
    fetchDataById(eventId)
  }
  $('.event-page .back-button').click(onClickBack)

  $('.event-page .book-button').click(onClickBook)

  $('.modal .close-button').click(onClickClose)

  // $('#delete-modal .delete-button').click(confirmDeleteEvent)
})
