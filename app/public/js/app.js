var urlUsers = 'users';//*1

new Vue({
	el: '#main',
	created: function() { 
		this.getUsers();
	},
	data: {
		lists: []
	},
	methods: {
		getUsers: function() { 
			axios.get(urlUsers).then(response => {
				this.lists = response.data;
			});

		}
	}


})