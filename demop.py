#import sqlalchemy as sa
from sqlalchemy import *
from sqlalchemy.orm import sessionmaker
from sqlalchemy.sql import table, column, select, update, insert
import pymysql
import os
userpass = 'mysql+pymysql://root:lionhead82@'
basedir  = '127.0.0.1'
socket   = '?unix_socket=/opt/lampp/var/mysql/mysql.sock'
engine = create_engine(userpass+basedir+socket)
insp = inspect(engine)
db_list = insp.get_schema_names()
print(db_list)

# import os
# import os
# from sqlalchemy import *
# from sqlalchemy.orm import sessionmaker
# from sqlalchemy.sql import table, column, select, update, insert
# import pymysql

# userpass = 'mysql+pymysql://root:lionhead82@'
# basedir  = '127.0.0.1'


# dbname   = '/mf_research'
# socket   = '?unix_socket=/opt/lampp/var/mysql/mysql.sock'
# dbname   = dbname + socket

# db = create_engine(userpass+basedir+dbname)
# con = db.connect()
# Session = sessionmaker(bind=db)
# session = Session()


# metadata = MetaData(bind=db)
# mytable = Table('schememaster', metadata, autoload=True)
#mutual_fund_provider_list=[]
# data_files_path=os.getcwd()+"/data"
# #client=MongoClient()
# #db=client["nav_amfi"]
# data_files=os.listdir(data_files_path)
# countr=0
# record_counter=0
# db_names=[]

# prev_record = None
# current_month = None
# for current_file_name in data_files:
# 	flag=0
# 	countr+=1
# 	curr_data_file=open(data_files_path+"/"+current_file_name,"r")
# 	current_file_lines=curr_data_file.readlines()	
# 	cols=current_file_lines[0].replace("\r","").replace("\n","").split(";")
# 	mutual_fund_company=""
# 	open_close_interval=0
# 	if current_file_name.find("Open Ended")!=-1:
# 		open_close_interval=1
# 	elif current_file_name.find("Close Ended")!=-1:
# 		open_close_interval=2
# 	elif current_file_name.find("Interval Fund")!=-1:
# 		open_close_interval=3
# 	firstInsert  = False
	
# 	for line in current_file_lines[1:]:	
# 		line=line.replace("\n",	"")
# 		line=line.replace("\r","")
	
# 		if len(line.split(";"))>2:
# 			vals=line.split(";")
# 			row={}
# 			for key,val in zip(cols,vals):
# 				row[key]=val
			
# 			new_row = {}
# 			new_row["amfiCode"] = row["Scheme Code"]
# 			new_row["date"] = row["Date"]
# 			new_row["nav"] = row["Net Asset Value"]
# 			print new_row
# 			#if new_row["nav"]==0:
# 			if flag==0:
# 				isvalid = "SELECT * FROM schememaster WHERE GrowthDiv='Growth' AND OpenClose='Open' AND AMFICode='"+new_row["amfiCode"]+"'"
# 				res = con.execute(isvalid)
# 				valid = res.fetchone()
# 				prev_record=new_row
# 				flag=1
# 				if valid !=None:
# 					newdate=new_row["date"].split("-")
# 					navdate="1-"+newdate[1]+"-"+newdate[2]
# 					insertrec = "INSERT INTO navhistory(amficode,nav,navdate) VALUES ('"+new_row["amfiCode"]+ "','" + new_row["nav"]+ "','" + navdate + "')"
# 				 	con.execute(insertrec)
# 				 	schemevalid=1
# 				else:
# 					schemecode=new_row["amfiCode"]
# 					insertscheme="SELECT * FROM schememaster WHERE AMFICode='"+new_row["amfiCode"]+"'"
# 					res = con.execute(insertscheme)
# 					insert = res.fetchone()
# 					if insert==None:
# 						insertrec = "INSERT INTO schememaster(amficode,newFlag) VALUES ('"+schemecode+ "','" + "1"+ "')"

# 					schemevalid=0
			
# 			elif prev_record["amfiCode"] != new_row["amfiCode"]:
# 				isvalid = "SELECT * FROM schememaster WHERE GrowthDiv='Growth' AND AMFICode='"+new_row["amfiCode"]+"'"
# 				res = con.execute(isvalid)
# 				valid = res.fetchone()
# 				prev_record=new_row
# 				if valid !=None:
# 					newdate=new_row["date"].split("-")
# 					navdate="1-"+newdate[1]+"-"+newdate[2]
# 					insertrec = "INSERT INTO navhistory(amficode,nav,navdate) VALUES ('"+new_row["amfiCode"]+ "','" + new_row["nav"]+ "','" + navdate + "')"
# 				 	con.execute(insertrec)
# 				 	schemevalid=1
# 				else:
# 					schemevalid=0
# 					insertscheme="SELECT * FROM schememaster WHERE AMFICode='"+new_row["amfiCode"]+"'"
# 					res = con.execute(insertscheme)
# 					insert = res.fetchone()
# 					if insert==None:
# 						insertrec = "INSERT INTO schememaster(amficode,newFlag) VALUES ('"+new_row["amfiCode"]+ "','" + "1"+ "')"
# 			elif schemevalid==1:
# 				newdate=new_row["date"].split("-")
# 				predate=prev_record["date"].split("-")
# 				if newdate[1]==predate[1] and newdate[2]==predate[2]:
# 					temp=new_row
# 				else:
# 					if newdate[0]==1:
# 						insertrec = "INSERT INTO navhistory(amficode,nav,navdate) VALUES ('"+new_row["amfiCode"]+ "','" + new_row["nav"]+ "','" + new_row["date"] + "')"
# 				 		con.execute(insertrec)
# 				 		prev_record=new_row
# 				 	else:
# 				 		navdate="1-"+newdate[1]+"-"+newdate[2]
# 				 		insertrec = "INSERT INTO navhistory(amficode,nav,navdate) VALUES ('"+temp["amfiCode"]+ "','" + temp["nav"]+ "','" + navdate + "')"
# 				 		con.execute(insertrec)
# 				 		prev_record=new_row
# 		