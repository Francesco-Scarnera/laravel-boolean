<script id="student-template" type="text/x-handlebars-template">
<a href="{{ url('students/show') }}/@{{ slug }}" class="student">
        <header>
            <img src="@{{ img }}" alt="@{{ nome }}">
            <div class="info">
                <h3>@{{ nome }} (@{{ età }} anni)</h3>
                <h4>
                    @{{ assunzione }} da @{{ azienda }} come @{{ ruolo }}
                </h4>
            </div>
        </header>
        <p>@{{ descrizione }}</p>
    </a>
</script>