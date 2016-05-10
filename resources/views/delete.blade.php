@if(Auth::check())
    <script type="text/javascript">
        function Delete(el) {
            if(confirm("确定要删除该条信息吗？")){
                $.ajax({
                    url: "{{ url($url) }}" + "/" + el.attr('data-id'),
                    type: "DELETE",
                    data: {_token: "{{ csrf_token() }}"},
                    dataType: "json",
                    success: function (json) {
                        if(json.status == "success") {
                            alert('删除成功！');
                            window.location.href = "{{ url()->current() }}";
                        } else {
                            alert('删除失败，请重试');
                        }
                    }
                })
            }
        }
    </script>
@endif