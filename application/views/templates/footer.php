            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-90">
                            <span class="blue bolder">Ace</span>
                            Application &copy; Web Programming <?= date('Y'); ?>
                        </span>

                        &nbsp; &nbsp;
                       
                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->
    

        <!--link java-->
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" ></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dataTables.buttons.min"></script>
        <script src="<?php echo base_url(); ?>assets/js/ace-extra.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.easypiechart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.sparkline.index.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.pie.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.flot.resize.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.colorbox.min.js"></script>
        <script src="<?php echo base_url(); ?>assets2/js/sweetalert2.all.min.js" ></script>
        <script src="<?php echo base_url(); ?>assets/js/myscript.js"></script>
        <!-- ace scripts -->
        <script src="<?php echo base_url(); ?>assets/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/ace.min.js"></script>

        <script src="<?php echo base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fullcalendar.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fullcalendar.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fullcalendar.print.min.css"></script>
        <script src="<?php echo base_url(); ?>assets/js/scriptcalender.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootbox.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/gcal.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#tabel1').DataTable();
            });
        </script>

        <script type="text/javascript">
            /* waktu untuk interval logoff ketika tidk ada kegiatan pada halaman web */
            let log_off = new Date();
            log_off.setSeconds(log_off.getSeconds() + 1800)
            log_off = new Date(log_off);

            let int_logoff = setInterval(function(){
                let now = new Date();
                if (now > log_off) {
                    Swal.fire({
                        title: 'Sesi login telah habis !',
                        text: 'Silahkan login kembali',
                        type: 'warning'
                    }).then((result) => {
                         window.location.assign("<?= base_url('auth/logout'); ?>");
                         clearInterval(log_off);
                    });
                }
            },5000);

            $('body').on('click', function(){
               // console.log('diklik');

                log_off = new Date();
                log_off.setSeconds(log_off.getSeconds() + 1800);
                log_off = new Date(log_off);
                console.log(log_off);
            });
        </script>    
        

        <script>
            // untuk input file pada form image
                $('#image,#image').ace_file_input({
                        no_file:'No File ...',
                        btn_choose:'Choose File',
                        btn_change:'Change',
                        droppable:false,
                        onchange:null,
                        thumbnail:false //| true | large
                        //whitelist:'gif|png|jpg|jpeg'
                        //blacklist:'exe|php'
                        //onchange:''
                        //
                    });

                //untuk gambar pada halaman detail
                jQuery(function($) {
                var $overflow = '';
                var colorbox_params = {
                    rel: 'colorbox',
                    reposition:true,
                    scalePhotos:true,
                    scrolling:false,
                    previous:'<i class="ace-icon fa fa-arrow-left"></i>',
                    next:'<i class="ace-icon fa fa-arrow-right"></i>',
                    close:'&times;',
                    current:'{current} of {total}',
                    maxWidth:'100%',
                    maxHeight:'100%',
                    onOpen:function(){
                        $overflow = document.body.style.overflow;
                        document.body.style.overflow = 'hidden';
                    },
                    onClosed:function(){
                        document.body.style.overflow = $overflow;
                    },
                    onComplete:function(){
                        $.colorbox.resize();
                    }
                };

                $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
                $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
                $(document).one('ajaxloadstart.page', function(e) {
                    $('#colorbox, #cboxOverlay').remove();
               });
            });
        </script>

        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>

        <script type="text/javascript">
            //calender
            jQuery(function($) {

/* initialize the external events
    -----------------------------------------------------------------*/

    $('#external-events div.external-event').each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
            zIndex: 999,
            revert: true,      // will cause the event to go back to its
            revertDuration: 0  //  original position after the drag
        });
        
    });




    /* initialize the calendar
    -----------------------------------------------------------------*/

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();


    var calendar = $('#calendar').fullCalendar({
        //isRTL: true,
        //firstDay: 1,// >> change first day of week 
        
        buttonHtml: {
            prev: '<i class="ace-icon fa fa-chevron-left"></i>',
            next: '<i class="ace-icon fa fa-chevron-right"></i>'
        },
    
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: "<?= base_url('admin/load'); ?>",
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!

        drop: function(date) { // this function is called when something is dropped
        
            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');
            var $extraEventClass = $(this).attr('data-class');
            
            
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            
            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = false;
            if($extraEventClass) copiedEventObject['className'] = [$extraEventClass];
            
            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
            
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                $(this).remove();
            }
            
        }
        ,
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            
            bootbox.prompt("New Event Title:", function(title) {
                if (title !== null) {
                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay,
                            className: 'label-info'
                        },
                        true // make the event "stick"
                    );
                }
            });
            

            calendar.fullCalendar('unselect');
        }
        ,
        eventClick: function(calEvent, jsEvent, view) {

            //display a modal
            var modal = 
            '<div class="modal fade">\
              <div class="modal-dialog">\
               <div class="modal-content">\
                 <div class="modal-body">\
                   <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
                   <form class="no-margin">\
                      <label>Change event name &nbsp;</label>\
                      <input class="middle" autocomplete="off" type="text" value="' + calEvent.title + '" />\
                     <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
                   </form>\
                 </div>\
                 <div class="modal-footer">\
                    <button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
                    <button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
                 </div>\
              </div>\
             </div>\
            </div>';
        
        
            var modal = $(modal).appendTo('body');
            modal.find('form').on('submit', function(ev){
                ev.preventDefault();

                calEvent.title = $(this).find("input[type=text]").val();
                calendar.fullCalendar('updateEvent', calEvent);
                modal.modal("hide");
            });
            modal.find('button[data-action=delete]').on('click', function() {
                calendar.fullCalendar('removeEvents' , function(ev){
                    return (ev._id == calEvent._id);
                })
                modal.modal("hide");
            });
            
            modal.modal('show').on('hidden', function(){
                modal.remove();
            });


            //console.log(calEvent.id);
            //console.log(jsEvent);
            //console.log(view);

            // change the border color just for fun
            //$(this).css('border-color', 'red');

        }
        
    });


})
        </script>
    </body>
</html>
