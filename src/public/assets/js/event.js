const successModalElement = document.querySelector('#success-modal')
const successModal = bootstrap.Modal.getOrCreateInstance(successModalElement)
const failedModalElement = document.querySelector('#failed-modal')
const failedModal = bootstrap.Modal.getOrCreateInstance(failedModalElement)

function fetchEventById(eventId) {
  $.ajax({
    url: `includes/event.inc.php?action=fetchById&eventId=${eventId}`,
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

function isBookedByUser(eventId) {
  $.ajax({
    url: `includes/event.inc.php?action=fetchBookingByUserId`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        res.data.forEach((booking) => {
          if (booking.event_id == eventId) {
            $('.booking-button').attr('disabled', 'disabled')
            $('.booking-button').addClass('disabled')
            $('.booking-text').css('display', 'block')
          }
        })
      } else {
        $('.toast').toast('hide')
        $('.toast-body').text(res.message)
        $('.toast').toast('show')
      }
    },
  })
}

function onClickBook(eventId) {
  if (!loginUserId) {
    window.location.href = `${publicPath}/login`
    return
  }
  $.ajax({
    url: `includes/event.inc.php?action=bookEvent&eventId=${eventId}`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        successModal.show()
        $('.booking-button').attr('disabled', 'disabled')
        $('.booking-button').addClass('disabled')
        $('.booking-text').css('display', 'block')
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
    fetchEventById(eventId)
    isBookedByUser(eventId)
    $('.event-page .booking-button').click(() => onClickBook(eventId))
  }
  $('.event-page .back-button').click(onClickBack)

  $('.modal .close-button').click(onClickClose)

  // $('#delete-modal .delete-button').click(confirmDeleteEvent)
})
