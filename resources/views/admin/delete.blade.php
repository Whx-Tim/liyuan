    <script type="text/javascript">
        function adminDelete(el) {
            if(confirm("确定要删除该条信息吗？")){
                $.ajax({
                    url: "{{ url($url) }}" + "/" + el.attr('data-id'),
                    type: "DELETE",
                    data: {_token: "{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (json) {
                        if(json.status == "success") {
                            window.location.href = "{{ url()->current() }}";
                            toastr.success(json.message);
                        } else {
                            toastr.error(json.message);
                        }
                    }
                })
            }
        }
    </script>