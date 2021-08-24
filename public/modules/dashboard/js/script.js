/*------------------------------------------------------------------
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-------------------------------------------------------------------*/
// Toggle sidebar on Menu button click
$('#sidebarCollapse').on('click', function() {
    $('#sidebar').toggleClass('active');
    $('#body').toggleClass('active');
});
function showLoading(txt)
{
    $('body').addClass('loading').find('> [loading_overlay]').fadeIn('fast');
    $('[loading_text]').text(txt);
}
function hideLoading()
{
    $('body').removeClass('loading').find('> [loading_overlay]').fadeOut('fast');
    $('[loading_text]').empty();
}
// Auto-hide sidebar on window resize if window size is small
// $(window).on('resize', function () {
//     if ($(window).width() <= 768) {
//         $('#sidebar, #body').addClass('active');
//     }
// });