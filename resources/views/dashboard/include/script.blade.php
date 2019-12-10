 <!--   Core   -->
 <script src="{{asset('/assets/js/plugins/jquery/dist/jquery.min.js')}}"></script>
 <script src="{{asset('/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
 <!--   Optional JS   -->
 <script src="{{asset('/assets/js/plugins/chart.js/dist/Chart.min.js')}}"></script>
 <script src="{{asset('/assets/js/plugins/chart.js/dist/Chart.extension.js')}}"></script>
 <!--   Argon JS   -->
 <script type="module" src="https://unpkg.com/x-frame-bypass"></script>
<script src="{{asset('assets/js/toastr.js')}}"></script>
 <script src="{{asset('/assets/js/argon-dashboard.min.js?v=1.1.0')}}"></script>
 <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
 <script>
   window.TrackJS &&
     TrackJS.install({
       token: "ee6fab19c5a04ac1a32a645abde4613a",
       application: "argon-dashboard-free"
     });
 </script>

<script>
    @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}", "Success")
    @endif
    </script>
<script>
    @if(Session::has('fail'))
        toastr.error("{{Session::get('fail')}}", "Fail")
    @endif
</script>
