// https://mgregchi02.medium.com/how-to-add-html-contents-and-style-to-bootstrap-5-popover-db2d910f8844

const triggerPopover = () => {
  var options = {
    html: true,
    trigger: 'focus',
    content: $('[data-name="popover-content"]'),
  }
  var exampleEl = document.getElementById('popover-trigger-btn')
  new bootstrap.Popover(exampleEl, options)
}

const onClickLogin = () => {
  window.location.href = '../public/login'
}

const onClickLogout = () => {
  $.ajax({
    url: 'logout.inc.php',
    type: 'POST',
    success: function () {
      window.location.href = '../public/home'
    },
  })
}

$(document).ready(() => {
  if ($('#popover-trigger-btn').length) {
    triggerPopover()
  }
  $('.login-button').click(onClickLogin)
  $('.logout-button').click(onClickLogout)
})
