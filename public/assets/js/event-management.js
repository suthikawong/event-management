document.addEventListener('DOMContentLoaded', function () {
  new DataTable('#eventTable', {
    layout: {
      topStart: null,
      topEnd: null,
      bottomStart: 'info',
      bottomEnd: 'paging',
    },
  })
})
