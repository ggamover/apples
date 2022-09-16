jQuery(document).ready(function(){
  jQuery('.btnBite').click(function() {
    const id = this.dataset.id;
    const portion = jQuery(this).prev('input').val();
    jQuery('#biteForm input[name="id"]').val(id);
    jQuery('#biteForm input[name="portion"]').val(portion);
    jQuery('#biteForm').submit();
  });

});

let time = new Date().getTime();
jQuery(document.body).bind("mousemove keypress", function(e) {
  time = new Date().getTime();
});
const RELOAD_INTERVAL = 60000;
const CHECK_INTERVAL = 10000;

function refresh() {
  if(new Date().getTime() - time >= RELOAD_INTERVAL){
    location.reload();
  }else{
    setTimeout(refresh, CHECK_INTERVAL);
  }
}

setTimeout(refresh, CHECK_INTERVAL);