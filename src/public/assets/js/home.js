var limit = 6
var offset = -limit
var keyword = ''

function fetchEvents() {
  offset += limit
  // load event data
  $.ajax({
    url: `includes/home.inc.php?action=fetchData&length=${limit}&start=${offset}&keyword=${keyword}`,
    type: 'GET',
    success: function (res) {
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
            // if there is no event then show "No events found" message
            else if (offset === 0) {
              $('#event-card-container').removeClass('grid')
              $('#event-card-container').addClass('flex')
              html = '<div>No events found</div>'
              $('#event-card-container').html(html)
            }

            const eventCount = $('#event-card-container .event-card').length
            // hide/show load more button
            if (eventCount === 0 || eventCount === res.recordsTotal) {
              $('button.load-button').hide()
            } else {
              $('button.load-button').show()
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

function onClickLoadMore() {
  fetchEvents()
}

function onSearch() {
  offset = -limit
  keyword = $('#search-keyword').val()
  $('#event-card-container').empty()
  fetchEvents()
}

function onClickEventCard(eventId) {
  window.location.href = `${publicPath}/home/${eventId}`
}

$(document).ready(function () {
  fetchEvents()
  $('button.load-button').click(fetchEvents)

  // search
  $('.search-button').click(onSearch)
})
