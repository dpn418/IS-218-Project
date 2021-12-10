<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_task_form">
        <input type="hidden" name="action" value="add_task">

        <label>Title:</label>
        <input type="text" name="title" maxlength="50"/>
        <br>

        <label>Description:</label>
        <input type="text" name="description" maxlength="500"/>
        <br>

        <label>Due Date:</label><!--date form '2021-12-10 04:20:00',-->
		<table>
			<tr>
				<th>Year</th>
				<th>Month</th>
                <th>Date</th>
			</tr>
			<tr>
				<td><input type="text" name="year" maxlength="4"/>
				<td><select name="month">
					<option value='01' default>January</option>
					<option value='02'>February</option>
					<option value='03'>March</option>
					<option value='04'>April</option>
					<option value='05'>May</option>
					<option value='06'>June</option>
					<option value='07'>July</option>
					<option value='08'>August</option>
					<option value='09'>September</option>
					<option value='10'>October</option>
					<option value='11'>November</option>
					<option value='12'>December</option>
				</select></td>
				<td><select name="date">
					<option value='01' default>01</option>
					<option value='02'>02</option>
					<option value='03'>03</option>
					<option value='04'>04</option>
					<option value='05'>05</option>
					<option value='06'>06</option>
					<option value='07'>07</option>
					<option value='08'>08</option>
					<option value='09'>09</option>
					<option value='10'>10</option>
					<option value='11'>11</option>
					<option value='12'>12</option>
					<option value='13'>13</option>
					<option value='14'>14</option>
					<option value='15'>15</option>
					<option value='16'>16</option>
					<option value='17'>17</option>
					<option value='18'>18</option>
					<option value='19'>19</option>
					<option value='20'>20</option>
					<option value='21'>21</option>
					<option value='22'>22</option>
					<option value='23'>23</option>
					<option value='24'>24</option>
					<option value='25'>25</option>
					<option value='26'>26</option>
					<option value='27'>27</option>
					<option value='28'>28</option>
					<option value='29'>29</option>
					<option value='30'>30</option>
					<option value='31'>31</option>
				</select></td>
			</tr>
			<tr>
                <th>Hour</th>
                <th>Minute</th>
				<th>Seconds</th>
			</tr>
			<tr>
				<td><select name="hour">
					<option value='00' default>00</option>
					<option value='01'>01</option>
					<option value='02'>02</option>
					<option value='03'>03</option>
					<option value='04'>04</option>
					<option value='05'>05</option>
					<option value='06'>06</option>
					<option value='07'>07</option>
					<option value='08'>08</option>
					<option value='09'>09</option>
					<option value='10'>10</option>
					<option value='11'>11</option>
					<option value='12'>12</option>
					<option value='13'>13</option>
					<option value='14'>14</option>
					<option value='15'>15</option>
					<option value='16'>16</option>
					<option value='17'>17</option>
					<option value='18'>18</option>
					<option value='19'>19</option>
					<option value='20'>20</option>
					<option value='21'>21</option>
					<option value='22'>22</option>
					<option value='23'>23</option>
				</select></td>
				<td><select name="minute">
					<option value='00' default>00</option>
					<option value='01'>01</option>
					<option value='02'>02</option>
					<option value='03'>03</option>
					<option value='04'>04</option>
					<option value='05'>05</option>
					<option value='06'>06</option>
					<option value='07'>07</option>
					<option value='08'>08</option>
					<option value='09'>09</option>
					<option value='10'>10</option>
					<option value='11'>11</option>
					<option value='12'>12</option>
					<option value='13'>13</option>
					<option value='14'>14</option>
					<option value='15'>15</option>
					<option value='16'>16</option>
					<option value='17'>17</option>
					<option value='18'>18</option>
					<option value='19'>19</option>
					<option value='20'>20</option>
					<option value='21'>21</option>
					<option value='22'>22</option>
					<option value='23'>23</option>
					<option value='24'>24</option>
					<option value='25'>25</option>
					<option value='26'>26</option>
					<option value='27'>27</option>
					<option value='28'>28</option>
					<option value='29'>29</option>
					<option value='30'>30</option>
					<option value='31'>31</option>
					<option value='32'>32</option>
					<option value='33'>33</option>
					<option value='34'>34</option>
					<option value='35'>35</option>
					<option value='36'>36</option>
					<option value='37'>37</option>
					<option value='38'>38</option>
					<option value='39'>39</option>
					<option value='40'>40</option>
					<option value='41'>41</option>
					<option value='42'>42</option>
					<option value='43'>43</option>
					<option value='44'>44</option>
					<option value='45'>45</option>
					<option value='46'>46</option>
					<option value='47'>47</option>
					<option value='48'>48</option>
					<option value='49'>49</option>
					<option value='50'>50</option>
					<option value='51'>51</option>
					<option value='52'>52</option>
					<option value='53'>53</option>
					<option value='54'>54</option>
					<option value='55'>55</option>
					<option value='56'>56</option>
					<option value='57'>57</option>
					<option value='58'>58</option>
					<option value='59'>59</option>
				</select></td>
				<td><select name="second">
					<option value='00' default>00</option>
					<option value='01'>01</option>
					<option value='02'>02</option>
					<option value='03'>03</option>
					<option value='04'>04</option>
					<option value='05'>05</option>
					<option value='06'>06</option>
					<option value='07'>07</option>
					<option value='08'>08</option>
					<option value='09'>09</option>
					<option value='10'>10</option>
					<option value='11'>11</option>
					<option value='12'>12</option>
					<option value='13'>13</option>
					<option value='14'>14</option>
					<option value='15'>15</option>
					<option value='16'>16</option>
					<option value='17'>17</option>
					<option value='18'>18</option>
					<option value='19'>19</option>
					<option value='20'>20</option>
					<option value='21'>21</option>
					<option value='22'>22</option>
					<option value='23'>23</option>
					<option value='24'>24</option>
					<option value='25'>25</option>
					<option value='26'>26</option>
					<option value='27'>27</option>
					<option value='28'>28</option>
					<option value='29'>29</option>
					<option value='30'>30</option>
					<option value='31'>31</option>
					<option value='32'>32</option>
					<option value='33'>33</option>
					<option value='34'>34</option>
					<option value='35'>35</option>
					<option value='36'>36</option>
					<option value='37'>37</option>
					<option value='38'>38</option>
					<option value='39'>39</option>
					<option value='40'>40</option>
					<option value='41'>41</option>
					<option value='42'>42</option>
					<option value='43'>43</option>
					<option value='44'>44</option>
					<option value='45'>45</option>
					<option value='46'>46</option>
					<option value='47'>47</option>
					<option value='48'>48</option>
					<option value='49'>49</option>
					<option value='50'>50</option>
					<option value='51'>51</option>
					<option value='52'>52</option>
					<option value='53'>53</option>
					<option value='54'>54</option>
					<option value='55'>55</option>
					<option value='56'>56</option>
					<option value='57'>57</option>
					<option value='58'>58</option>
					<option value='59'>59</option>
				</select></td>
			</tr>
		</table>
		
		<label>Urgency:</label>
        <select name="urgency">
			<option value=0 default>Normal</option>
			<option value=1>Important</option>
			<option value=2>Very Important</option>
        </select>
        <br>
		
        <label>&nbsp;</label>
        <input type="submit" value="Add Task" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_tasks">View Task List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>