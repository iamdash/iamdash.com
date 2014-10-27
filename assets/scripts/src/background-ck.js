//var backgrounds = [
//    {
//        'image': {
//            'file': 'autumn.jpg',
//            'url': 'http://www.flickr.com/photos/iamdashnet/8103852614/in/photostream/',
//            'title': 'Lovely, just lovely'
//        },
//        'image': {
//            'file': 'feet.jpg',
//            'url': 'http://www.flickr.com/photos/iamdashnet/8103852614/in/photostream/',
//            'title': 'Lovely, just lovely'
//        },
//        'image': {
//            'file': 'lake.jpg',
//            'url': 'http://www.flickr.com/photos/iamdashnet/8103852614/in/photostream/',
//            'title': 'Lovely, just lovely'
//        },
//        'image': {
//            'file': 'landscape.jpg',
//            'url': 'http://www.flickr.com/photos/iamdashnet/8103852614/in/photostream/',
//            'title': 'Lovely, just lovely'
//        },
//        'image': {
//            'file': 'pillars.jpg',
//            'url': 'http://www.flickr.com/photos/iamdashnet/8103852614/in/photostream/',
//            'title': 'Lovely, just lovely'
//        },
//        'image': {
//            'file': 'van.jpg',
//            'url': 'http://www.flickr.com/photos/iamdashnet/8103852614/in/photostream/',
//            'title': 'Lovely, just lovely'
//
//        }
//    }
//];
var backgrounds=["autumn.jpg","feet.jpg","lake.jpg","landscape.jpg","pillars.jpg","van.jpg"],bg=_(backgrounds).pickRandom();window.onload=function(){$("#dash").backstretch("../assets/images/backgrounds/"+bg)};