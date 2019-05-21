using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Access
{
    #region Attend
    public class Attend
    {
        #region Member Variables
        protected unknown _Date;
        protected int _Emp_id;
        protected unknown _Time;
        protected string _Status;
        protected string _Access_method;
        #endregion
        #region Constructors
        public Attend() { }
        public Attend(unknown Date, int Emp_id, unknown Time, string Status, string Access_method)
        {
            this._Date=Date;
            this._Emp_id=Emp_id;
            this._Time=Time;
            this._Status=Status;
            this._Access_method=Access_method;
        }
        #endregion
        #region Public Properties
        public virtual unknown Date
        {
            get {return _Date;}
            set {_Date=value;}
        }
        public virtual int Emp_id
        {
            get {return _Emp_id;}
            set {_Emp_id=value;}
        }
        public virtual unknown Time
        {
            get {return _Time;}
            set {_Time=value;}
        }
        public virtual string Status
        {
            get {return _Status;}
            set {_Status=value;}
        }
        public virtual string Access_method
        {
            get {return _Access_method;}
            set {_Access_method=value;}
        }
        #endregion
    }
    #endregion
}