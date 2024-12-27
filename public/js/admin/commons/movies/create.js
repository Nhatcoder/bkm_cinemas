let selectedActorIds = [];

$('#movie_actors option:selected').each(function() {
    const actorId = $(this).val();
    selectedActorIds.push(actorId);
});

function formatOption(actor) {
    if (!actor.id) {
        return actor.text;
    }

    var $option = $(
        '<span><img src="' + $(actor.element).data('image') +
        '" class="img-thumbnail" style="width: 50px; height: 50px; margin-right: 10px;" />' + actor.text + '</span>'
    );
    return $option;
}

$("#movie_actors").select2({
    templateResult: formatOption,
    templateSelection: formatOption
});

$('#movie_actors').on('change', function() {
    const currentActorIds = $('#movie_actors option:selected').map(function() {
        return $(this).val();
    }).get();

    selectedActorIds.forEach(function(actorId) {
        if (!currentActorIds.includes(actorId)) {
            $(`#roleBoxes .role-box[data-actor-id="${actorId}"]`).remove();
        }
    });

    currentActorIds.forEach(function(actorId) {
        if (!selectedActorIds.includes(actorId)) {
            const actorName = $(`#movie_actors option[value="${actorId}"]`).text();

            let maxIndex = Math.max(0, ...$('#roleBoxes .role-box').map(function() {
                return parseInt($(this).data('index'), 10);
            }).get());
            let index = maxIndex + 1;

            const roleBox = `
                <div class="role-box" data-actor-id="${actorId}" data-index="${index}">
                    <label>Vai trò của ${actorName}: </label>
                    <input class="form-control" type="text" name="movie_actors[${index}][role]" value="">
                    <input class="form-control" type="text" hidden name="movie_actors[${index}][actor_id]" value="${actorId}">
                    <input class="form-control" type="text" hidden name="actors_name[${index}]" value="${actorName}">
                </div>
            `;
            $('#roleBoxes').append(roleBox);
        }
    });

    selectedActorIds = currentActorIds;
});
