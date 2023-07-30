<script src="{{ asset('style_files/backend/plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('style_files/backend/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('style_files/backend/plugins/jekyll-search.min.js') }}"></script>
<script src="{{ asset('style_files/backend/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('style_files/backend/plugins/charts/Chart.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
{{-- Extra JS : --}}
@yield('admin_javascript')
<script src="{{  asset('style_files/shared/js/custom.js') }}"></script>
<script src="{{asset('style_files/backend/js/sleek.bundle.js')}}"></script>
</body>

</html>
