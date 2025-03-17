var limit = 0

const fetchEvents = () => {
  limit += 3
  $.ajax({
    url: `home.inc.php?action=fetchData&limit=${limit}`,
    type: 'GET',
    success: function (response) {
      console.log(response.events)
      const eventCount = response.events.length
      let html = ''
      if (eventCount > 0) {
        response.events.forEach((event) => {
          html += response.element.replace('$event_name', event.event_name)
        })
      } else {
        // echo "There are no events!";
      }

      // render event card
      $('#event-card-container').html(html)
      // hide load more button
      if (eventCount === 0 || eventCount === response.total) {
        $('button.load-button').hide()
      }
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
