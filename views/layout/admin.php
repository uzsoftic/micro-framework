<!doctype html>
<html lang="en">
<head>
    {% include 'layout/inc/meta.php' %}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('theme/admin/style.min.css') }}">
</head>
<body>

<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

    {% include 'layout/inc/sidebar.php' %}

    {% include 'layout/inc/header.php' %}

    {% block content %}{% endblock %}

    {% include 'layout/inc/footer.php' %}

</div>
<!-- END Page Container -->

<script src="{{ asset('theme/admin/app.min.js') }}"></script>
</body>
</html>
