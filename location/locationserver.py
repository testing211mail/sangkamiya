from flask import Flask, jsonify, redirect, request,Response, render_template, url_for, send_from_directory
import os
os.environ['TF_CPP_MIN_LOG_LEVEL'] = '3'
import base64
import json
from werkzeug import secure_filename
from flask_pymongo import PyMongo
from flask_cors import CORS, cross_origin
import hashlib
from bson.objectid import ObjectId
import math
import flask_pymongo
from flask_uploads import UploadSet, configure_uploads
import requests
import os.path


app = Flask(__name__)
CORS(app)
app.config["MONGO_DBNAME"]="locations"
mongo=PyMongo(app)

@app.route('/test',methods=['POST'])
def test():
	print "yo"
	return jsonify({"success":"true","message":"Yo"})

@app.route('/dologin',methods=['POST'])
def dologin():
	user=mongo.db.user.find({"username":request.get_json()["username"],"password":request.get_json()["password"]})
	user=list(user)
	print user
	if len(user):
		for u in user:
			u["_id"]=str(u["_id"])	
		return jsonify({"success":"true","user":user,"message":"Login Successfully"})
	else:
		return jsonify({"success":"false","message":"Invalid Credentials"})



@app.route('/getlocation',methods=['POST'])
def getlocation():
	locations=mongo.db.location.find({})
	locations=list(locations)
	for l in locations:
		l["_id"]=str(l["_id"])	
	return jsonify({"success":"true","locations":locations})

@app.route('/addrecord',methods=['POST'])
def addrecord():
	mongo.db.location.insert(request.get_json())
	return jsonify({"success":"true","message":"record inserted successfully"})

@app.route('/deteterecord',methods=['POST'])
def deteterecord():
	locations=mongo.db.location.remove({"_id":ObjectId(request.get_json()["id"])})
	
	return jsonify({"success":"true","message":"Record Deleted Successfully"})

@app.route('/getrecord',methods=['POST'])
def getrecord():
	location=mongo.db.location.find({"_id":ObjectId(request.get_json()["id"])})	
	location=list(location)
	for l in location:
		l["_id"]=str(l["_id"])
	if len(location):
		return jsonify({"success":"true","details":location[0]})
	else:
		return jsonify({"success":"false","message":"location not found"})	


@app.route('/editrecord',methods=['POST'])
def editrecord():
	mongo.db.location.update_one({"_id":ObjectId(request.get_json()["id"])} ,{"$set":request.get_json()["info"]},upsert=False)
	return jsonify({"success":"true","message":"Record Updated Successfully"})
	


@app.route('/login',methods=['POST'])
def login():
	code = request.get_json()["code"]
	
	if code == "181207":
		return jsonify({"success":"true"})
	else:
		return jsonify({"success":"false"})
	


if __name__ == '__main__':
	app.run(host='0.0.0.0',port=int(8888),debug=True, threaded=True)
