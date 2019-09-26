<div class="navbar-offset"></div>
<script type="text/javascript">
    jQuery(function($) {
        $(document).ready(function() {
            var offset = $(".navbar-offset");
            var breadcrumbs = $("#mobile-breadcrumb-container");
            offset.height(offset.height() + breadcrumbs.height());
        })
    });
</script>