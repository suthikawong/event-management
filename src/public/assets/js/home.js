var limit = 0

const fetchEvents = () => {
  limit += 3
  // load event data
  $.ajax({
    url: `home.inc.php?action=fetchData&limit=${limit}`,
    type: 'GET',
    success: function (response) {
      const res = JSON.parse(response)
      // load event-card.php to render event cards
      $.ajax({
        url: 'components/event-card.php',
        type: 'GET',
        success: function (element) {
          if (res.statusCode === 200) {
            const eventCount = res.events.length
            let html = ''
            // if there are events then replace event data in card
            if (eventCount > 0) {
              res.events.forEach((event) => {
                html += element.replace('$event_name', event.event_name)
              })
            }
            // if there is no event then show "No events found" message
            else {
              html = `
              <div></div>
              <div style="margin: auto;">No events found</div>
              <div></div>
              `
            }
            // render event card
            $('#event-card-container').html(html)
            // hide/show load more button
            if (eventCount === 0 || eventCount === res.total) {
              $('button.load-button').hide()
            } else {
              $('button.load-button').show()
            }
          } else {
            $('.toast').toast('hide')
            $('.toast-body').text(res.message)
            $('.toast').toast('show')
          }
        },
      })
    },
  })
}

const onClickLoadMore = () => {
  fetchEvents()
}

$(document).ready(function () {
  fetchEvents()
  $('button.load-button').click(fetchEvents)
})
