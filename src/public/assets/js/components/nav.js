// https://mgregchi02.medium.com/how-to-add-html-contents-and-style-to-bootstrap-5-popover-db2d910f8844

function triggerPopover() {
  var options = {
    html: true,
    trigger: 'focus',
    content: $('[data-name="popover-content"]'),
  }
  var exampleEl = document.getElementById('popover-trigger-btn')
  new bootstrap.Popover(exampleEl, options)
}

function onClickLogin() {
  window.location.href = '../public/login'
}

function onClickLogout() {
  $.ajax({
    url: 'includes/logout.inc.php',
    type: 'POST',
    success: function () {
      window.location.href = '../public/home'
    },
  })
}

function styleActiveMenuItem() {
  const splitUrl = window.location.href.split('/public/')
  const currPath = splitUrl[splitUrl.length - 1].split('/')[0]
  $('.menu-list > .menu-item > a').each(function (index) {
    const href = $(this).attr('href')
    const paths = href.split('/')
    if (currPath === paths[paths.length - 1]) {
      $('.menu-list > .menu-item').eq(index).addClass('active')
    } else {
      $('.menu-list > .menu-item').eq(index).removeClass('active')
    }
  })
}

$(document).ready(function () {
  styleActiveMenuItem()
  if ($('#popover-trigger-btn').length) {
    triggerPopover()
  }
  $('.login-button').click(onClickLogin)
  $('.logout-button').click(onClickLogout)
})
