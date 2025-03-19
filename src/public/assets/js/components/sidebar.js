const onClickLogout = () => {
  $.ajax({
    url: 'logout.inc.php',
    type: 'POST',
    success: function () {
      window.location.href = '../public/home'
    },
  })
}

const styleActiveMenuItem = () => {
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

$(document).ready(() => {
  styleActiveMenuItem()
  $('.logout-button').click(onClickLogout)
})
