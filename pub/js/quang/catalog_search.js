var SlideThumb = React.createClass({
    displayName: 'slideThumb',
    onClickDownload(event){
      if(typeof typeUser !== 'undefined'){
        alert('You need to login to download file!');
      } else {
        window.location = this.props.data.url;
      }
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
                        <button type="button"  className="btn btn-default" title="Share">
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
    items: React.PropTypes.array
  },
  getInitialState: function() {
    return {
      items: (this.props.items || [])
    };
  },
  componentWillMount: function () {
    console.log(keyword);
    $.getJSON("/slide/search/"+keyword, function(data) {
      this.setState({items : data.data});
    }.bind(this));
  },
  render: function() {
    return (
        <div className="container">
          <div  className="row text-center center-items">
            <div id="center"  className="col-md-12">
              <h2>Search Result</h2>
              <hr  className="catalog"/>
              <div  className="row">

                {this.state.items.map(function(item, i) {
                  return <SlideThumb key={i} data={item}></SlideThumb>;
                })}

              </div>
              <hr></hr>
              <span  className="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>
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
});