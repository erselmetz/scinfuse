<script src="/ckeditor/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    var mySidebar = document.getElementById("mySidebar");
    var overlayBg = document.getElementById("myOverlay");

    function w3_open_sidebar() {
        if (mySidebar.style.display === 'block') {
            mySidebar.style.display = 'none';
            overlayBg.style.display = "none";
        } else {
            mySidebar.style.display = 'block';
            overlayBg.style.display = "block";
        }
    }

    function w3_close_sidebar() {
        mySidebar.style.display = "none";
        overlayBg.style.display = "none";
    }

    // modal 
    function modal_show(select){
        document.querySelector(select).style.display = 'block';
    }

    function modal_close(select){
        document.querySelector(select).style.display = 'none';
    }

    const show = params => {
        const x = document.querySelector(params);
        if (x.className.indexOf("w3-show") == -1) { 
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    const hide = params => {
        const x = document.querySelector(params);
        if (x.className.indexOf("w3-show") == -1) { 
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }   
    const toggle = params => {
        const x = document.querySelector(params);
        if (x.className.indexOf("w3-show") == -1) { 
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }    
</script>