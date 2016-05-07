var SlideThumb = React.createClass({
    displayName: 'slideThumb',
    onClickDownload(event){
      if(typeof typeUser !== 'undefined'){
        window.location = this.props.data.url;
      } else {
        alert('You need to login to download file!');
      }
    },
    shareClick(event){
/*      FB.ui(
      {
      method: 'feed',
      name: 'ABC',
      link: 'https://localhost:8080/',
      picture: 'https://gamecount-number-bk.herokuapp.com/images/ScreenShot.png',
      caption: 'Let\'s play Count Number.',
      description: '',
      message: '',
      display: 'popup'
      });*/
      FB.ui({
            method: 'feed',
            link: "http://localhost:8080/",
            name: "The name who will be displayed on the post",
            description: "The description who will be displayed"
          }, function(response){
              console.log(response);
          }
      );
    },
    render() {
        return (
            <div  className="col-md-4 text-center">
              <div  className="padding-item top-10">
                <div  className="hover-group">
                  <div  className="image-wrapper">
                    <a  className="link-item" href={"/catalog/"+this.props.data.topicid+"/"+this.props.data.slideid}>
                      <img  className="img-responsive center-block item-picture" src={"/slide/getslide/"+this.props.data.slideid+"/1"} alt="item" title="Sky temple"></img>
                    </a>
                    <div  className="hover-toggle btn-group-justified">
                    <div  className="btn-group btn-group-justified" role="group" aria-label="...">
                      <div  className="btn-group" role="group">
                        <button type="button"  className="btn btn-default" title="Like" >
                          <img src="/pub/img/Thumb-Up-48.png" width="24" alt="like"></img>
                        </button>
                      </div>

                        <div  className="btn-group" role="group">

                          <button type="button" onClick={this.onClickDownload}  className="btn btn-default" title="Download" >
                            <img src="/pub/img/Download-48.png" width="24" alt="download"></img>
                          </button>

                        </div>
                      <div  className="btn-group" role="group">
                        <button type="button" onClick={this.shareClick}  className="btn btn-default share_button" title="Share">
                          <img src="/pub/img/Share-48.png" width="24" alt="share"></img>
                        </button>
                      </div>
                    </div>
                    </div>
                  </div>
                  <p  className="info text-left no-padding">
                    <span  className="glyphicon glyphicon-circle-arrow-down"></span> 1.4k&emsp;
                    <span  className="glyphicon glyphicon-star span-item"></span> 2.3k
                  </p>
                  <hr></hr>
                  <a href={"/catalog/"+this.props.data.topicid+"/"+this.props.data.slideid}>
                    <div  className="col-md-12 text-left no-padding">
                      <p  className="title-temple">{this.props.data.title}<br></br>{this.props.data.description}</p>
                      <p  className="author-temple">Kun</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
        );
    }
});

//module.exports = slideThumb;
var ExampleApplication = React.createClass({
  propTypes: {
    items: React.PropTypes.array,
    topic: React.PropTypes.string
  },
  getInitialState: function() {
    return {
      items: (this.props.items || []),
      topic: (this.props.topic || "Topic")
    };
  },
  componentWillMount: function () {
    $.getJSON("/slide/getlist/"+topicId, function(data) {
      this.setState({items : data.data});
      $('#loadAni').hide();
    }.bind(this));

    $.getJSON("/topic/get", function(data) {
      console.log(data);
      for (var i = data.length - 1; i >= 0; i--) {
        if(Number(data[i].topicid) == topicId){
          this.setState({topic : data[i].name});
          break;
        }
      };
    }.bind(this));
  },
  render: function() {
    console.log(this.state.topic)
    return (
        <div className="container">
          <div  className="row text-center center-items">
            <div id="center"  className="col-md-12">
              <h2>{this.state.topic} Topic</h2>
              <hr  className="catalog"/>
              <div  className="row">

                {this.state.items.map(function(item, i) {
                  return <SlideThumb key={i} data={item}></SlideThumb>;
                })}

              </div>
              <hr></hr>
              <span id='loadAni' className="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
              <div
                className="fb-like"
                data-share="true"
                data-width="450"
                data-show-faces="true">
              </div>
            </div>
          </div>
        </div>

      );
  }
});


$( document ).ready(function() {
  ReactDOM.render(
    <ExampleApplication/>,
    document.getElementById('root')//document.getElementById('container')
  );

/*  window.fbAsyncInit = function() {
  FB.init({appId: '1597825477138674', status: true, cookie: true,
  xfbml: true});
  };*/
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1597825477138674',
      xfbml      : true,
      version    : 'v2.6'
    });
  };
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

/*  (function() {
  var e = document.createElement('script'); e.async = true;
  e.src = document.location.protocol +
  '//connect.facebook.net/en_US/all.js';
  document.getElementById('fb-root').appendChild(e);
  }());*/
});