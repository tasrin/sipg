@if(Session::has('alert-type'))
    <script>
        mkNotifications();
        // var options = 
        // {
        //     link: {
        //       function: function() 
        //       {
        //           mkNoti('Link Callback function','This is the callback function.', { status: 'success' });
        //       }
        //     },
        //     dismissable: false,
        //     callback: function() 
        //     {
        //         mkNoti('Close Callback function','This is the callback function.', { status: 'success' });
        //     },
        //     sound: true
        // };

        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                mkNoti("{{ Session::get('message') }}",
                        {
                            sound : true,
                            status: "info",
                            link: {
                              url: "http://www.adi-techno.com/",
                              target: "_blank",
                            }
                        }
                    );
                break;

            case 'warning':
                mkNoti(
                    "Warning",
                    "{!! Session::get('message') !!}",
                        {
                            sound : true,
                            status: "warning"
                        }
                    );
                break;

            case 'success':
                mkNoti(
                        "Success",
                        "{{ Session::get('message') }}", 
                        {
                            sound : true,
                            status: "success"
                        }
                    );
                break;

            case 'error':
                mkNoti(
                        "Rejected",
                        "{{ Session::get('message') }}", 
                        {
                            sound : true,
                            status: "danger",
                        }
                    );
                break;
        }
    </script>
@endif