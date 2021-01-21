var size=-1;
$('#menu_toggle').on('click',()=>{
    $('#body').removeClass();
    $('#body').addClass((size==1)?'nav-md':'nav-sm');
    size*=-1;
});

