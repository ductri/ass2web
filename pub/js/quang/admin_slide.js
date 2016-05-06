var Slide = React.createClass({
    displayName: 'slide',
    getInitialState() {
      return {deleteClicked: false};
    },
    handleClick(event) {
      //this.setState({liked: !this.state.liked});
      console.log('Clicked');
      $.ajax({
        url: '/slide/delete/'+this.props.data.slideid,
        type: 'get',
        dataType: 'json',
        success: function(data){
          console.log(data);
          this.unmount();
        }.bind(this)
      });
    },
    unmount() {
      console.log('setState');
      this.setState({deleteClicked: true});
    },
    render() {
      console.log(this.state.deleteClicked);
      var text = this.state.deleteClicked ? "danger" : '';
      var dis = this.state.deleteClicked ? "Not exist" : 'Delete';
      //var disE = this.state.deleteClicked ? "Not exist" : 'Edit';
      //var hide = this.state.deleteClicked ? "none" : 'block';
      console.log(text);
      return (
          <tr className={text}>
            <td>{this.props.data.slideid}</td>
            <td>{this.props.data.filename}</td>
            <td>{this.props.data.title}</td>
            <td>{this.props.data.topicid}</td>
            <td><button type="button" onClick={this.handleClick} disabled={this.state.deleteClicked}>{dis}</button></td>
          </tr>
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
    $.getJSON("/slide/getlist/1", function(data) {
      this.setState({items : data.data});
    }.bind(this));
  },
  render: function() {
    console.log(this.state.items)
    return (
        <div className="container">

          <div className="row">
            <div className="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
              <table className="table table-bordered">
                <thead>
                  <tr>
                    <th>Slide ID</th>
                    <th>Name</th>
                    <th>Tilte</th>
                    <th>Topic ID</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  {this.state.items.map(function(item, i) {
                  return <Slide key={i} data={item}></Slide>;
                  })}
                </tbody>
              </table>
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

/*$.getJSON('/slide/getlist/1', function (response) {
  // Response div goes here.
  alert(response);
  console.log(response);
});*/

});