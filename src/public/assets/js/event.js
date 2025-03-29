const successModalElement = document.querySelector('#success-modal')
const successModal = bootstrap.Modal.getOrCreateInstance(successModalElement)
const failedModalElement = document.querySelector('#failed-modal')
const failedModal = bootstrap.Modal.getOrCreateInstance(failedModalElement)
const ticketModalElement = document.querySelector('#ticket-modal')
const ticketModal = bootstrap.Modal.getOrCreateInstance(ticketModalElement)

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
        $('.event-datetime-content > div:first-child > span').text(moment(data.date).format('DD/MM/YY'))
        $('.event-datetime-content > div:last-child > span').text(moment(data.date).format('hh:mm A'))
        $('.event-category-content').text(data.category)
        $('.event-location-content').text(data.location)
        if (data.image) {
          $('.event-img').attr('src', `${uploadsPath}/${data.image}`)
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
            $('.view-button').css('display', 'block')
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
  $('.booking-button').attr('disabled', 'disabled')
  $('.booking-button').addClass('disabled')

  $.ajax({
    url: `includes/event.inc.php?action=bookEvent&eventId=${eventId}`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        successModal.show()
        $('.view-button').css('display', 'block')
      } else {
        $('.booking-button').removeClass('disabled')
        failedModal.show()
      }
    },
  })
}

function onClickClose() {
  successModal.hide()
  failedModal.hide()
  ticketModal.hide()
}

function generateQRCode(eventId) {
  const url = `${publicPath}/home/${eventId}`
  $('#qrcode').empty()
  new QRCode($('#qrcode')[0], {
    text: url,
    width: 180,
    height: 180,
    colorDark: '#000',
    colorLight: '#fff',
    correctLevel: QRCode.CorrectLevel.H,
  })
  $('.event-page input[name=qrcode-link]').val(url)
}

function onClickViewTicket(eventId) {
  ticketModal.show()
  generateQRCode(eventId)
}

function onClickCopyText() {
  const copyText = $('.event-page input[name=qrcode-link]').val()
  navigator.clipboard.writeText(copyText)
}

$(document).ready(function () {
  const eventId = splitUrl()
  if (eventId) {
    fetchEventById(eventId)
    isBookedByUser(eventId)
    $('.event-page .booking-button').click(() => onClickBook(eventId))
    $('.event-page .view-button').click(() => onClickViewTicket(eventId))
  }
  $('.event-page .back-button').click(onClickBack)

  $('.modal .close-button').click(onClickClose)

  $('#ticket-modal .copy-button').click(onClickCopyText)

  // $('#delete-modal .delete-button').click(confirmDeleteEvent)
})
