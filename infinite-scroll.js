/*
##  Written By Kyle Coots
##  Date 7-21-2019
##
##  This program is free software: you can redistribute it and/or modify
##  it under the terms of the GNU General Public License as published by
##  the Free Software Foundation, either version 3 of the License, or
##  (at your option) any later version.
##
##  This program is distributed in the hope that it will be useful,
##  but WITHOUT ANY WARRANTY; without even the implied warranty of
##  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
##  GNU General Public License for more details.
##
##  You should have received a copy of the GNU General Public License
##  along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

  var wait = false;

  $(function(){
      console.log('Loaded...');
      InfinteScroll.loadPost(5);
  });

  $(window).scroll(function(){
    if($(window).scrollTop() >= $(document).height() - $(window).height()-100){
      // Get last item
      var last = $('.content--post:last-of-type .content--hidden-post-id:last-of-type').last().val();
      console.log('Window Scroll Last: '+last);
      InfinteScroll.loadPost(1,last);
    }
  });

var InfinteScroll = {
  loadPost: (qty, offset) => {
    if(wait !== true){

      wait = true;

      var data = {
        items:qty,
        oset:offset
      }

      $.ajax({
          url:"api.php",
          type:"POST",
          dataType:"json",
          data:data,
          success:function(data){

            if(data !== false){

              $.each(data, function(index, value){
                var date = new Date(value.date*1000);
                var html = '';
                html = html + '<div class="content--post">';
                html = html + '<input class="content--hidden-post-id" type="hidden" value="'+value.id+'">';
                html = html + '<span class="content--post-id">'+value.id+'</span>';
                html = html + '<span class="content--post-text">'+value.content+'</span>';
                html = html + '<span class="content--post-date">'+date+'</span>';
                html = html + '</div>';

                $('#content').append(html);

              });

              wait = false;

              // Check if page is scrollable if not load more
              if ($("body").height() < $(window).height()) {
                InfinteScroll.loadMore();
              }else{
                console.log('Scrollbar Should Be Visable!');
              }

            }else {

              $('#content').append('<span class="content--post-end">No More To Load!</span>');
              wait = true;

            }

          }
      });
    }
  },
  loadMore: () => {

    console.log('No Scrollbar Detected...');
    console.log('Loading More Post...');

    //var last = $('.content-post:last-of-type input.content--hidden-post-id:last-of-type').val();
    var last = $('.content--post:last-of-type .content--hidden-post-id:last-of-type').last().val();
    console.log('Load More Last: '+last);
    InfinteScroll.loadPost(1,last);

  }
}
