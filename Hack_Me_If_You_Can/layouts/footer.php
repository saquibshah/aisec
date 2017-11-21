            </div>
        </div><!-- /container -->  
    </body>
    <script>
        $(function(){
            $('#left_side_bar a').each(function(){
                if (window.location.href.indexOf($(this).attr('href')) !== -1) {
                    $(this).addClass('active');
                    $(this).parent().parent().show().siblings('a').find('.glyphicon-chevron-right').hide().siblings('.glyphicon-chevron-down').show().parent().parent().parent().show().siblings('a').find('.glyphicon-chevron-right').hide().siblings('.glyphicon-chevron-down').show();
                }
            });
        });
    </script>
</html>

