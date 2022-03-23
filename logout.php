<script src="/dist/js/jquery.js"></script>
<script>
    $.ajax({
        type: "POST",
        url: "/server/auth/logout.php",
        data: {
            requestToLogout: true
        },
        success: function (response) {
            const res = JSON.parse(response);
            
            if(res.login == false){
                localStorage.setItem('auth','');
                window.location.href = '/';
            }
        }
    });
</script>