$(document).ready(function () {
    $("#image").on("change", function () {
        $("#imagePreview").empty(); // Clear previous previews

        var files = this.files; // Get the selected files

        if (files.length > 0) {
            $.each(files, function (i, file) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#imagePreview").append(`
                        <div class="col-auto">
                            <img src="${e.target.result}" class="img-fluid img-thumbnail" alt="Image Preview">
                        </div>
                    `);
                };

                reader.readAsDataURL(file); // Read the file as a data URL
            });
        }
    });
});

$(document).ready(function () {
    // Listen for input changes
    $("#colorSearch").on("keyup", function () {
        var query = $(this).val().toLowerCase();
        $("#colorSuggestions").empty(); // Clear previous suggestions

        if (query.length > 0) {
            var filteredColors = colors.filter(function (color) {
                return color.name.toLowerCase().includes(query);
            });

            // Show suggestions
            filteredColors.forEach(function (color) {
                var colorName =
                    color.name.charAt(0).toUpperCase() + color.name.slice(1);
                $("#colorSuggestions")
                    .append(
                        `
                    <a href="#" class="list-group-item list-group-item-action color-suggestion" data-id="${color.id}" data-name="${colorName}">
                        ${colorName}
                    </a>
                `
                    )
                    .removeClass("d-none");
            });
        }
    });

    $("#sizeSearch").on("keyup", function () {
        var query = $(this).val().toLowerCase();
        $("#sizeSuggestions").empty(); // Clear previous suggestions

        if (query.length > 0) {
            var filteredSizes = sizes.filter(function (size) {
                return size.name.toLowerCase().includes(query);
            });

            // Show suggestions
            filteredSizes.forEach(function (size) {
                var sizeName =
                    size.name.charAt(0).toUpperCase() + size.name.slice(1);
                $("#sizeSuggestions")
                    .append(
                        `
                    <a href="#" class="list-group-item list-group-item-action size-suggestion" data-id="${size.id}" data-name="${sizeName}">
                        ${sizeName}
                    </a>
                `
                    )
                    .removeClass("d-none");
            });
        }
    });

    $("#weightSearch").on("keyup", function () {
        var query = $(this).val().toLowerCase();
        $("#weightSuggestions").empty(); // Clear previous suggestions

        if (query.length > 0) {
            var filteredWeights = weights.filter(function (weight) {
                return weight.name.toLowerCase().includes(query);
            });

            // Show suggestions
            filteredWeights.forEach(function (weight) {
                var weightName =
                    weight.name.charAt(0).toUpperCase() + weight.name.slice(1);
                $("#weightSuggestions")
                    .append(
                        `
                    <a href="#" class="list-group-item list-group-item-action weight-suggestion" data-id="${weight.id}" data-name="${weightName}">
                        ${weightName}
                    </a>
                `
                    )
                    .removeClass("d-none");
            });
        }
    });

    // Handle clicking on a suggestion
    $(document).on("click", ".color-suggestion", function (e) {
        e.preventDefault();
        var colorName = $(this).data("name");
        var colorId = $(this).data("id");

        // Append the selected color to the input field
        $("#colorSearch").val(colorName);
        // Optionally, you can add the color ID to a hidden input or array
        $("#colorSuggestions").addClass("d-none").empty(); // Clear suggestions after selection
    });

    // Handle clicking on a suggestion
    $(document).on("click", ".size-suggestion", function (e) {
        e.preventDefault();
        var sizeName = $(this).data("name");
        var sizeId = $(this).data("id");

        // Append the selected size to the input field
        $("#sizeSearch").val(sizeName);
        // Optionally, you can add the size ID to a hidden input or array
        $("#sizeSuggestions").addClass("d-none").empty(); // Clear suggestions after selection
    });
    // Handle clicking on a suggestion
    $(document).on("click", ".weight-suggestion", function (e) {
        e.preventDefault();
        var weightName = $(this).data("name");
        var weightId = $(this).data("id");

        // Append the selected weight to the input field
        $("#weightSearch").val(weightName);
        // Optionally, you can add the weight ID to a hidden input or array
        $("#weightSuggestions").addClass("d-none").empty(); // Clear suggestions after selection
    });

    // Hide suggestions when clicking outside the input or suggestions
    $(document).on("click", function (e) {
        if (!$(e.target).closest("#colorSearch, #colorSuggestions").length) {
            $("#colorSuggestions").addClass("d-none").empty(); // Clear suggestions if clicked outside
        }
        if (!$(e.target).closest("#sizeSearch, #sizeSuggestions").length) {
            $("#sizeSuggestions").addClass("d-none").empty(); // Clear suggestions if clicked outside
        }
        if (!$(e.target).closest("#weightSearch, #weightSuggestions").length) {
            $("#weightSuggestions").addClass("d-none").empty(); // Clear suggestions if clicked outside
        }
    });
});
