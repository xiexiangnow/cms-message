@if (Session::has('success_message'))
<script type="text/javascript">
    $.toast({
        heading: '提示信息',
        text: "{{ session('success_message') }}",
        position: 'top-right',
        stack: false
    })
</script>
@endif
@if (Session::has('error_message'))
<script type="text/javascript">
    $.toast({
        heading: '提示信息',
        text: "{{ session('error_message') }}",
        position: 'top-right',
        stack: false,
        bgColor: '#FF1356',
        textColor: 'white'
    })
</script>
@endif