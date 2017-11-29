<template>
    <div v-if="sources.length === 0" class="loading">Loading...</div>
    <div v-for="source in sources" class="container">
        <h2>All {{ source.sourcetype }}</h2>
        <h3>{{ source.title }}</h3>
        <small>Release Date: {{ source.releasedate }}</small>
        <p>{{ source.desc }}</p>
        <p><a href="/{{ source.sourcetype }}/{{ api.slug }}">Read More</a></p>
    </div>
</template>
<script>
    methods: {
    	bottomVisible: function bottomVisible() {
    		var scrollY = window.scrollY;
    		var visible = document.documentElement.clientHeight;
    		var pageHeight = document.documentElement.scrollHeight;
    		var bottomOfPage = visible + scrollY >= pageHeight;
    		return bottomOfPage || pageHeight < visible;
    	},
    	addSource: function addSource() {
    		var _this = this;
    		axios.get('#').then(function(response) {
    			var api = response.data[0];
    			var apiInfo = {
    				name: api.title,
    				desc: api.description,
    				img: api.img_url,
    				releasedate: api.release_date,
    				sourcetpye: api.source_type,
    				slug: api.slug,
    			};
    			_this.sources.push(apiInfo);
    			if (_this.bottomVisible()) {
    				_this.addSource();
    			}
    		});
    	}
    	},
    	watch: {
    		bottom: function bottom(_bottom) {
    			if (_bottom) {
    				this.addSource();
    			}
    		}
    	},
    	created: function created() {
    		var _this2 = this;
    		window.addEventListener('scroll', function() {
    			_this2.bottom = _this2.bottomVisible();
    		});
    		this.addSource();
    	}
    });
</script>