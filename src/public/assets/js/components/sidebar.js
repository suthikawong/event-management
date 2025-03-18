const onClickLogout = () => {
  console.log('logout')
  $.ajax({
    url: 'logout.inc.php',
    type: 'POST',
    success: function () {
      window.location.href = '../public/home'
    },
  })
}

$(document).ready(() => {
  $('.logout-button').click(onClickLogout)
})
