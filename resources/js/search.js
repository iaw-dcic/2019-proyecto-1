$('#div_search .typeahead').typeahead({
    hint: true,
    minLength: 1,
},{
    limit: 5,
    name: 'username',
    source: (query, sync, async) => {
        return $.get(`/user/search/?username=${query}`, (data) => {
            let users = {username: []}
            data.users.forEach(user => {
                users.username.push(user.username);
            })
            return async(users.username);
        });
    }
});
