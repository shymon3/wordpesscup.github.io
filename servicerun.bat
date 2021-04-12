@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist "C:\Bitnami\WORDPR~1.7-2\hypersonic\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\server\hsql-sample-database\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\ingres\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\ingres\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\mysql\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\mysql\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\postgresql\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\postgresql\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\elasticsearch\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\elasticsearch\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\logstash\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\logstash\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\openoffice\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\openoffice\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\apache-tomcat\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\apache-tomcat\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\apache2\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\apache2\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\resin\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\resin\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\activemq\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\activemq\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\jetty\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\jetty\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\subversion\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\subversion\scripts\servicerun.bat" START)
rem RUBY_APPLICATION_START
if exist "C:\Bitnami\WORDPR~1.7-2\lucene\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\lucene\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\mongodb\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\mongodb\scripts\servicerun.bat" START)
if exist "C:\Bitnami\WORDPR~1.7-2\third_application\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\third_application\scripts\servicerun.bat" START)
goto end

:stop
echo "Stopping services ..."
if exist "C:\Bitnami\WORDPR~1.7-2\third_application\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\third_application\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\lucene\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\lucene\scripts\servicerun.bat" STOP)
rem RUBY_APPLICATION_STOP
if exist "C:\Bitnami\WORDPR~1.7-2\subversion\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\subversion\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\jetty\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\jetty\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\hypersonic\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\server\hsql-sample-database\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\resin\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\resin\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\activemq\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\activemq\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\openoffice\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\openoffice\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\apache2\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\apache2\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\apache-tomcat\scripts\servicerun.bat" (start "" /MIN /WAIT "C:\Bitnami\WORDPR~1.7-2\apache-tomcat\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\logstash\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\logstash\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\elasticsearch\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\elasticsearch\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\ingres\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\ingres\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\mysql\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\mysql\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\mongodb\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\mongodb\scripts\servicerun.bat" STOP)
if exist "C:\Bitnami\WORDPR~1.7-2\postgresql\scripts\servicerun.bat" (start "" /MIN "C:\Bitnami\WORDPR~1.7-2\postgresql\scripts\servicerun.bat" STOP)

:end
