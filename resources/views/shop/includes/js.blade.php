{{-- <script type="text/javascript">
    var route = "{{ url('/search/autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
      return $.get(route, { term: query }, function (data) {
              return process(data);
          });
      }
    },
      {
        hint: true,
        highlight: true,
        minLength: 1
        },
      );
</script> --}}

{{--
<script type="text/javascript">
    var route = "{{ url('/search/autocomplete') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
            return $.get(route, { term: query }, function (data) {
                return process(data);
            });
        },
        updater: function(item) {
            // Handle selection of an item from the autocomplete dropdown
            // For example, you can redirect to a product page or do something else
            return item;
        },
        matcher: function(item) {
            // Customize the matching logic if needed
            return true;
        },
        sorter: function(items) {
            // Sort the items if needed
            return items;
        },
        highlighter: function(item) {
            // Customize how the items are highlighted in the dropdown
            return item;
        },
        minLength: 1
    }).on('typeahead:render', function() {
        // Handle custom rendering, e.g., showing images
        $('.tt-suggestion').each(function() {
            var suggestion = $(this);
            var title = suggestion.text();
            var image = suggestion.data('image');
            suggestion.html('<img src="' + image + '" class="autocomplete-image" />' + title);
        });
    });
</script> --}}

{{-- <script>
    $(document).ready(function() {
        $('input.typeahead').on('input', function() {
            var query = $(this).val();
            var route = "{{ url('/search/autocomplete') }}";
            $.ajax({
                url: route,
                method: 'GET',
                data: { term: query },
                success: function(data) {
                    var suggestions = data.map(function(item) {
                        // Set width and height attributes directly in the img tag
                        return '<div><img src="' + item.image + '" width="50" height="50" /><span>' + item.title + '</span></div>';
                    });
                    $('#autocomplete-results').html(suggestions.join(''));
                }
            });
        });
    });
</script> --}}


<script>
    $(document).ready(function() {
        var typingTimer; // Timer identifier
        var doneTypingInterval = 2000; // Time in milliseconds (2 seconds)

        $('input.typeahead').on('input', function() {
            clearTimeout(typingTimer); // Clear the previous timer

            // Start a new timer to delay the search
            typingTimer = setTimeout(function() {
                var query = $('input.typeahead').val();
                var route = "{{ url('/search/autocomplete') }}";
                $.ajax({
                    url: route,
                    method: 'GET',
                    data: { term: query },
                    success: function(data) {
                        var suggestions = data.map(function(item) {
                            // Wrap each suggestion in a div tag with the product title as data attribute
                            return '<div class="suggestion" data-title="' + item.title + '"><img src="' + item.image + '" width="50" height="50" /><span>' + item.title + '</span></div>';
                        });
                        $('#autocomplete-results').html(suggestions.join(''));
                    }
                });
            }, doneTypingInterval);
        });

        // Click event handler for suggestions
        $(document).on('click', '.suggestion', function() {
            var title = $(this).data('title'); // Get the product title from data attribute
            $('input.typeahead').val(title); // Set the input value to the product title
            $('#autocomplete-results').empty(); // Clear the autocomplete results
            $('#search-form').submit(); // Submit the search form with ID "search-form"
        });

        // Click event handler to close autocomplete results when clicking outside
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#autocomplete-results').length && !$(event.target).is('input.typeahead')) {
                $('#autocomplete-results').empty(); // Clear the autocomplete results
            }
        });
    });
</script>



