var User = React.createClass({
    displayName: 'user',
    getInitialState() {
      return {deleteClicked: false};
    },
    handleClick(event) {
      //this.setState({liked: !this.state.liked});
      console.log('Clicked');
      $.ajax({
        url: '/user/delete/'+this.props.data.userid,
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
            <td>{this.props.data.userid}</td>
            <td>{this.props.data.username}</td>
            <td>{this.props.data.email}</td>
            <td>{this.props.data.userright}</td>
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
    $.getJSON("/user/getlist/0/100", function(data) {
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
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  {this.state.items.map(function(item, i) {
                  return <User key={i} data={item}></User>;
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

/*$.getJSON('/user/getlist/0/10', function (response) {
  // Response div goes here.
  alert(response);
  console.log(response);
});*/

});