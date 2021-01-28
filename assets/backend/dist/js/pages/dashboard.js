$(function(){'use strict'
$('.connectedSortable').sortable({placeholder:'sort-highlight',connectWith:'.connectedSortable',handle:'.card-header, .nav-tabs',forcePlaceholderSize:true,zIndex:999999})
$('.connectedSortable .card-header, .connectedSortable .nav-tabs-custom').css('cursor','move')
$('.todo-list').sortable({placeholder:'sort-highlight',handle:'.handle',forcePlaceholderSize:true,zIndex:999999})
var visitorsData={'US':398,'SA':400,'CA':1000,'DE':500,'FR':760,'CN':300,'AU':700,'BR':600,'IN':800,'GB':320,'RU':3000}
})