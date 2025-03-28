function fetchBookedEvents() {
  $.ajax({
    url: `includes/booked-events.inc.php?action=fetchBookingByUserId`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        // load event-card.php to render event cards
        $.ajax({
          url: 'components/event-card.php',
          type: 'GET',
          success: function (element) {
            // if there are events then replace event data in card
            if (res.data.length > 0) {
              res.data.forEach((event) => {
                let elem = element
                let html = ''
                html = elem.replace('$event_name', event.event_name)
                html = html.replace('$start_date', moment(event.start_date).format('lll'))
                html = html.replace('$location', event.location)
                if (event.image) {
                  html = html.replace('$image', `${uploadsPath}/${event.image}`)
                } else {
                  html = html.replace('$image', 'assets/images/default-img.png')
                }
                // render event cared
                $('#event-card-container').removeClass('flex')
                $('#event-card-container').addClass('grid')
                $('#event-card-container').append($(html))
                $('#event-card-container .event-card:last-child').click(() => onClickEventCard(event.event_id))
              })
            }
            // if there is no booked event then show "No events found" message
            else {
              $('#event-card-container').removeClass('grid')
              $('#event-card-container').addClass('flex')
              html = '<div>No events found</div>'
              $('#event-card-container').html(html)
            }
          },
        })
      } else {
        $('.toast').toast('hide')
        $('.toast-body').text(res.message ?? 'Something went wrong. Please try again.')
        $('.toast').toast('show')
      }
    },
  })
}

function onClickEventCard(eventId) {
  window.location.href = `${publicPath}/home/${eventId}`
}

$(document).ready(function () {
  fetchBookedEvents()
  $('button.load-button').click(fetchBookedEvents)
})
