var Topic = React.createClass({
    displayName: 'topic',
    getInitialState() {
      return {deleteClicked: false};
    },
    handleClick(event) {
      //this.setState({liked: !this.state.liked});
      console.log('Clicked');
      $.ajax({
        url: '/topic/delete',
        type: 'post',
        dataType: 'json',
        data: {'topicid' : this.props.data.topicid},
        success: function(data){
          console.log(data);
          this.unmount();
        }.bind(this)
      });
    },
    handleClickEdit(event) {
      //this.setState({liked: !this.state.liked});
      console.log('Clicked');
      $('#nameID').val(this.props.data.topicid);
      $('#nameO').val(this.props.data.name);
    },
    unmount() {
      console.log('setState');
      this.setState({deleteClicked: true});
    },
    render() {
      console.log(this.state.deleteClicked);
      var text = this.state.deleteClicked ? "danger" : '';
      var dis = this.state.deleteClicked ? "Not exist" : 'Delete';
      var disE = this.state.deleteClicked ? "Not exist" : 'Edit';
      //var hide = this.state.deleteClicked ? "none" : 'block';
      console.log(text);
      return (
          <tr className={text}>
            <td>{this.props.data.topicid}</td>
            <td>{this.props.data.name}</td>
            <td><button type="button" onClick={this.handleClickEdit} disabled={this.state.deleteClicked}>{disE}</button></td>
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
    $.getJSON("/topic/get", function(data) {
      this.setState({items : data});
    }.bind(this));
  },
  submitAdd: function(event){
    event.preventDefault();
    var ajaxurl = '/topic/add',
    data =  { 'name': $('#nameA').val() };
    console.log(data);
    $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      //alert(response);
      this.componentWillMount();
    }.bind(this));
  },
  submitEdit: function(event){
    event.preventDefault();
    var ajaxurl = '/topic/edit',
    data =  { 'topicid': $('#nameID').val() ,'newName': $('#nameE').val() };
    console.log(data);
    $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      //alert(response);
      $('#nameID').val('');
      $('#nameO').val('');
      $('#nameE').val('');
      this.componentWillMount();
    }.bind(this));
  },
  render: function() {
    console.log(this.state.items)
    return (
        <div className="container">

          <div className="row">
            <div className="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
              <div>
                <h4>Add topic</h4>
                <form  role="form" id="addForm"  onSubmit={this.submitAdd}>
                  <input className="form-control" id="nameA" name="name" type="text" size="25" placeholder="name"></input>
                  <input className="btn btn-default" type="submit" name="action" value="Add"></input>
                </form>
                <br></br>
                <h4>Edit topic</h4>
                <form role="form" id="editForm"  onSubmit={this.submitEdit}>
                  <div className="form-group">
                    <label for="idtopic">ID topic: </label>
                    <input className="form-control" id="nameID" name="idtopic" type="text" size="25" placeholder="ID topic" readOnly="readonly"></input>
                  </div>
                  <div>
                    <label for="nameOld">Current name: </label>
                    <input className="form-control" id="nameO" name="nameOld" type="text" size="25" placeholder="Current name" readOnly="readonly"></input>
                  </div>
                  <div>
                    <label for="newName">New name: </label>
                    <input className="form-control" id="nameE" name="nameNew" type="text" size="25" placeholder="New name"></input>
                  </div>
                  <input className="btn btn-default" type="submit" name="action" value="Edit"></input>
                </form>
                <br></br>
              </div>
              <table className="table table-bordered">
                <thead>
                  <tr>
                    <th>Topic ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  {this.state.items.map(function(item, i) {
                  return <Topic key={i} data={item}></Topic>;
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

/*  $( "#addForm" ).submit(function( event ) {
    event.preventDefault();
    var ajaxurl = '/topic/add',
    data =  { 'name': $('#nameE').val() };
    console.log(data);
    $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      alert(response);
      console.log(response);
      refresh();
    });
  });*/
});