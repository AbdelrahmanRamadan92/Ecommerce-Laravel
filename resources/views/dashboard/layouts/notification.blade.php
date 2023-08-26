@if (session()->has('add'))
<script>
    window.onload=function(){
        notif({
            msg:'تم الاضافة بنجاح',
            type:'success'
        });
    }
</script>
    
@endif
@if (session()->has('edite'))
<script>
    window.onload=function(){
        notif({
            msg:'تم التحديث بنجاح',
            type:'success'
        });
    }
</script>
    
@endif
@if (session()->has('delete'))
<script>
    window.onload=function(){
        notif({
            msg:'تم الحذف بنجاح',
            type:'success'
        });
    }
</script>
    
@endif