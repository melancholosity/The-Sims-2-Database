<?php
class Sim
{
	
	/* TO ADD:
		- cause of death
		- second benefits
		- friends and best friends
	  */
	const DATABASE_HOST = "localhost";
	const DATABASE_USER = "sims";
	const DATABASE_PASS = "makaroner";
	const DATABASE_DB   = "sims";
	private $name;
	private $gender;
	private $age;
	private $supernatural;
	private $fitnessstate;
	private $skin;
	private $eyes;
	private $hair;
	private $other;
	private $bio;
	private $aspiration;
	private $ltw;
	private $benefits;
	private $turnons;
	private $turnoff;
	private $zodiac;
	private $sloppyneat;
	private $shyoutgoing;
	private $lazyactive;
	private $seriousplayful;
	private $grouchynice;
	private $environment;
	private $weather;
	private $money;
	private $paranormal;
	private $fashion;
	private $crime;
	private $entertainment;
	private $work;
	private $toys;
	private $food;
	private $culture;
	private $politics;
	private $health;
	private $travel;
	private $sports;
	private $animals;
	private $school;
	private $scifi;
	private $artscrafts;
	private $filmliterature;
	private $games;
	private $nature;
	private $sportshobby;
	private $cuisine;
	private $fitness;
	private $musicdance;
	private $science;
	private $tinkering;
	private $cooking;
	private $mechanical;
	private $charisma;
	private $body;
	private $logic;
	private $creativity;
	private $cleaning;
	private $otherskills;
	private $talentbadges;
	private $grades;
	private $diploma;
	private $job;
	private $level;
	private $previousjobs;
	private $parents;
	private $children;
	private $pets;
	private $spouses;
	private $betrothed;
	private $dating;
	private $grandparents;
	private $grandchildren;
	private $cousins;
	private $niecesnephews;
	private $auntsuncles;
	private $siblings;
	private $memories;
	private $neighbourhood;
	private $lives;
	private $owns;
	
	function __construct($sim_name)
	{
		$this->name = $sim_name;
		$this->loadSimData();
	}
	
	private function loadSimData()
	{
		$mysql = new MySQLi(self::DATABASE_HOST,self::DATABASE_USER,self::DATABASE_PASS,self::DATABASE_DB);
		if($mysql->connect_errno) {
			printf("Connection failed: %s\n", $mysql->connect_error);
		}
		$res = $mysql->query("SELECT * FROM sims WHERE name='{$this->name}'");
		if($mysql->errno) {
			printf("MySQL error when querying: %s\n",$mysql->error);
		}
		if($res->num_rows == 0) {
			printf("Could not find sim '%s' in database (does not exist?)\n",$this->name);
		}
		if($res->num_rows > 1) {
			printf("Duplicate sims found in database, using first sim (should rename second sim or update php to fix this bug)\n");
		}
		
		$sim = $res->fetch_assoc();
		$this->gender = $sim['gender'];
		$this->age = $sim['age'];
		$this->supernatural = $sim['supernatural'];
		$this->fitnessstate = $sim['fitnessstate'];
		$this->skin = $sim['skin'];
		$this->eyes = $sim['eyes'];
		$this->hair = $sim['hair'];
		$this->other = $sim['other'];
		$this->bio = $sim['bio'];
		$this->aspiration = $sim['aspiration'];
		$this->ltw = $sim['ltw'];
		$this->benefits = $sim['benefits'];
		$this->turnons = $sim['turnons'];
		$this->turnoff = $sim['turnoff'];
		$this->zodiac = $sim['zodiac'];
		$this->sloppyneat = $sim['sloppyneat'];
		$this->shyoutgoing = $sim['shyoutgoing'];
		$this->lazyactive = $sim['lazyactive'];
		$this->seriousplayful = $sim['seriousplayful'];
		$this->grouchynice = $sim['grouchynice'];
		$this->environment = $sim['environment'];
		$this->weather = $sim['weather'];
		$this->money = $sim['money'];
		$this->paranormal = $sim['paranormal'];
		$this->fashion = $sim['fashion'];
		$this->crime = $sim['crime'];
		$this->entertainment = $sim['entertainment'];
		$this->work = $sim['work'];
		$this->toys = $sim['toys'];
		$this->food = $sim['food'];
		$this->culture = $sim['culture'];
		$this->politics = $sim['politics'];
		$this->health = $sim['health'];
		$this->travel = $sim['travel'];
		$this->sports = $sim['sports'];
		$this->animals = $sim['animals'];
		$this->school = $sim['school'];
		$this->scifi = $sim['scifi'];
		$this->artscrafts = $sim['artscrafts'];
		$this->filmliterature = $sim['filmliterature'];
		$this->games = $sim['games'];
		$this->nature = $sim['nature'];
		$this->sportshobby = $sim['sportshobby'];
		$this->cuisine = $sim['cuisine'];
		$this->fitness = $sim['fitness'];
		$this->musicdance = $sim['musicdance'];
		$this->science = $sim['science'];
		$this->tinkering = $sim['tinkering'];
		$this->cooking = $sim['cooking'];
		$this->mechanical = $sim['mechanical'];
		$this->charisma = $sim['charisma'];
		$this->body = $sim['body'];
		$this->logic = $sim['logic'];
		$this->creativity = $sim['creativity'];
		$this->cleaning = $sim['cleaning'];
		$this->otherskills = $sim['otherskills'];
		$this->talentbadges = $sim['talentbadges'];
		$this->grades = $sim['grades'];
		$this->diploma = $sim['diploma'];
		$this->job = $sim['job'];
		$this->level = $sim['level'];
		$this->previousjobs = $sim['previousjobs'];
		$this->parents = $sim['parents'];
		$this->children = $sim['children'];
		$this->cats = $sim['cats'];
		$this->dogs = $sim['dogs'];
		$this->grandchildren = $sim['grandchildren'];
		$this->spouses = $sim['spouses'];
		$this->betrothed = $sim['betrothed'];
		$this->dating = $sim['dating'];
		$this->grandparents = $sim['grandparents'];
		$this->cousins = $sim['cousins'];
		$this->niecesnephews = $sim['niecesnephews'];
		$this->auntsuncles = $sim['auntsuncles'];
		$this->siblings = $sim['siblings'];
		$this->memories = $sim['memories'];
		$this->neighbourhood = $sim['neighbourhood'];
		$this->lives = $sim['lives'];
		$this->owns = $sim['owns'];
	}
	
	public function generateSimPage() 
	{
		?><a class="index" href="?page=index">Index</a>
			 <table>
			 <tr><td>Picture(s) (TODO: create images)</td></tr>
			 </table>
			 <table>
		<?php
			echo "<tr><td>Name:</td><td>" . ucwords($this->name) . "</td>";
			if($this->gender != "")
				echo "<tr><td>Gender:</td><td>{$this->gender}</td>";
			if($this->age != "")
				echo "<tr><td>Age:</td><td>{$this->age}</td></tr>";
			if($this->supernatural != "")
				echo "<tr><td>Other:</td><td>{$this->supernatural}</td></tr>";
			echo "</table>";
			echo "<table>";
			if($this->fitnessstate != "")
				echo "<tr><td>Fitness:</td><td>{$this->fitnessstate}</td></tr>";
			if($this->skin != "")
				echo "<tr><td>Skin colour:</td><td>{$this->skin}</td></tr>";
			if($this->eyes != "")
				echo "<tr><td>Eye colour:</td><td>{$this->eyes}</td></tr>";
			if($this->hair != "")
				echo "<tr><td>Hair:</td><td>{$this->hair}</td></tr>";
			if($this->other != "")
				echo "<tr><td>Other:</td><td>{$this->other}</td></tr>";
			echo "</table>";
			echo "<table>";
			if($this->bio != "")
			echo "<tr><td>Bio:</td><td>{$this->bio}</td></tr>";
			if($this->aspiration != "")
				echo "<tr><td>Aspiration:</td><td>{$this->aspiration}</td></tr>";
			if($this->ltw != "")
				echo "<tr><td>Lifetime Want:</td><td>{$this->ltw}</td></tr>";
			if($this->benefits != "")
				echo "<tr><td>Aspiration benefits:</td><td>{$this->benefits}</td></tr>";
			if($this->turnons != "")
				echo "<tr><td>Turn-ons:</td><td>{$this->turnons}</td></tr>";
			if($this->turnoff != "")
				echo "<tr><td>Turn-off:</td><td>{$this->turnoff}</td></tr>";
			if($this->zodiac != "")
				echo "<tr><td>Zodiac:</td><td>{$this->zodiac}</td></tr>";
			echo "</table>";
			echo "<table>";
			echo "<tr><td class=\"left\">Sloppy</td><td>"
			.$this->generateTraitDiagram($this->sloppyneat)."</td>
			<td>Neat</td>
			</tr>";
			echo "<tr><td class=\"left\">Shy</td><td>"
			.$this->generateTraitDiagram($this->shyoutgoing)."</td>
			<td>Outgoing</td>
			</tr>";
			echo "<tr><td class=\"left\">Lazy</td><td>"
			.$this->generateTraitDiagram($this->lazyactive)."</td>
			<td>Active</td>
			</tr>";
			echo "<tr><td class=\"left\">Serious</td><td>"
			.$this->generateTraitDiagram($this->seriousplayful)."</td>
			<td>Playful</td>
			</tr>";
			echo "<tr><td class=\"left\">Grouchy</td><td>"
			.$this->generateTraitDiagram($this->grouchynice)."</td>
			<td>Nice</td>
			</tr>";
			echo "</table><table>";
			echo "<tr><td class=\"left\">Environment</td><td>"
			.$this->generateTraitDiagram($this->environment)."</td>";
			echo "<td class=\"left\">Food</td><td>"
			.$this->generateTraitDiagram($this->food)."</td></tr>";
			echo "<tr><td class=\"left\">Weather</td><td>"
			.$this->generateTraitDiagram($this->weather)."</td>";
			echo "<td class=\"left\">Culture</td><td>"
			.$this->generateTraitDiagram($this->culture)."</td></tr>";
			echo "<tr><td class=\"left\">Money</td><td>"
			.$this->generateTraitDiagram($this->money)."</td>";
			echo "<td class=\"left\">Politics</td><td>"
			.$this->generateTraitDiagram($this->politics)."</td></tr>";
			echo "<tr><td class=\"left\">Paranormal</td><td>"
			.$this->generateTraitDiagram($this->paranormal)."</td>";
			echo "<td class=\"left\">Health</td><td>"
			.$this->generateTraitDiagram($this->health)."</td></tr>";
			echo "<tr><td class=\"left\">Fashion</td><td>"
			.$this->generateTraitDiagram($this->fashion)."</td>";
			echo "<td class=\"left\">Travel</td><td>"
			.$this->generateTraitDiagram($this->travel)."</td></tr>";
			echo "<tr><td class=\"left\">Crime</td><td>"
			.$this->generateTraitDiagram($this->crime)."</td>";
			echo "<td class=\"left\">Sports</td><td>"
			.$this->generateTraitDiagram($this->sports)."</td></tr>";
			echo "<tr><td class=\"left\">Entertainment</td><td>"
			.$this->generateTraitDiagram($this->entertainment)."</td>";
			echo "<td class=\"left\">Animals</td><td>"
			.$this->generateTraitDiagram($this->animals)."</td></tr>";
			echo "<tr><td class=\"left\">Work</td><td>"
			.$this->generateTraitDiagram($this->work)."</td>";
			echo "<td class=\"left\">School</td><td>"
			.$this->generateTraitDiagram($this->school)."</td></tr>";
			echo "<tr><td class=\"left\">Toys</td><td>"
			.$this->generateTraitDiagram($this->toys)."</td>";
			echo "<td class=\"left\">Sci-fi</td><td>"
			.$this->generateTraitDiagram($this->scifi)."</td></tr>";
			echo "</table><table>";
			echo "<tr><td class=\"left\">Arts and Crafts</td><td>"
			.$this->generateTraitDiagram($this->artscrafts)."</td>";
			echo "<td class=\"left\">Cuisine</td><td>"
			.$this->generateTraitDiagram($this->cuisine)."</td></tr>";
			echo "<tr><td class=\"left\">Film and Literature</td><td>"
			.$this->generateTraitDiagram($this->filmliterature)."</td>";
			echo "<td class=\"left\">Fitness</td><td>"
			.$this->generateTraitDiagram($this->fitness)."</td></tr>";
			echo "<tr><td class=\"left\">Games</td><td>"
			.$this->generateTraitDiagram($this->games)."</td>";
			echo "<td class=\"left\">Music and Dance</td><td>"
			.$this->generateTraitDiagram($this->musicdance)."</td></tr>";
			echo "<tr><td class=\"left\">Nautre</td><td>"
			.$this->generateTraitDiagram($this->nature)."</td>";
			echo "<td class=\"left\">Science</td><td>"
			.$this->generateTraitDiagram($this->science)."</td></tr>";
			echo "<tr><td class=\"left\">Sports</td><td>"
			.$this->generateTraitDiagram($this->sportshobby)."</td>";
			echo "<td class=\"left\">Tinkering</td><td>"
			.$this->generateTraitDiagram($this->tinkering)."</td></tr>";
			echo "</table>";
			echo "<table>";
			echo "<tr><td class=\"left\">Cooking</td><td>"
			.$this->generateTraitDiagram($this->cooking)."</td></tr>";
			echo "<tr><td class=\"left\">Mechanical</td><td>"
			.$this->generateTraitDiagram($this->mechanical)."</td></tr>";
			echo "<tr><td class=\"left\">Charisma</td><td>"
			.$this->generateTraitDiagram($this->charisma)."</td></tr>";
			echo "<tr><td class=\"left\">Body</td><td>"
			.$this->generateTraitDiagram($this->body)."</td></tr>";
			echo "<tr><td class=\"left\">Logic</td><td>"
			.$this->generateTraitDiagram($this->logic)."</td></tr>";
			echo "<tr><td class=\"left\">Creativity</td><td>"
			.$this->generateTraitDiagram($this->creativity)."</td></tr>";
			echo "<tr><td class=\"left\">Cleaning</td><td>"
			.$this->generateTraitDiagram($this->cleaning)."</td></tr>";
			echo "</table>";
			echo "<table>";
			if($this->otherskills != "")
				echo "<tr><td>Other Skills:</td><td>{$this->otherskills}</td></tr>";
			if($this->talentbadges != "")
				echo "<tr><td>Talent Badges:</td><td>{$this->talentbadges}</td></tr>";
			echo "</table>";
			echo "<table>";
			if($this->grades != "")
				echo "<tr><td>Grades:</td><td>{$this->grades}</td></tr>";
			if($this->diploma != "")
				echo "<tr><td>Diploma:</td><td>{$this->diploma}</td></tr>";
			if($this->job != "")
				echo "<tr><td>Job:</td><td>{$this->job}</td></tr>";
			if($this->level != "")
				echo "<tr><td>Level:</td><td>{$this->level}</td></tr>";
			if($this->previousjobs != "")
				echo "<tr><td>Previous jobs:</td><td>{$this->previousjobs}</td></tr>";
			echo "</table>";
			$this->generateRelationshipTable();
			echo "<table>";
			if($this->memories != "")
				echo "<tr><td>Memories:</td><td>{$this->memories}</td></tr>";
			echo "</table><table>";
			if($this->neighbourhood != "")
				echo "<tr><td>Neighbourhood:</td><td>{$this->neighbourhood}</td></tr>";
			if($this->lives != "")
				echo "<tr><td>Lives:</td><td>{$this->lives}</td></tr>";
			if($this->owns != "")
				echo "<tr><td>Owns:</td><td>{$this->owns}</td></tr>";
			
	}
	
	private function generateRelationshipTable()
	{
		echo "<table>";
		if($this->parents != "")
		{
			$parents = str_getcsv($this->parents);
			echo "<tr><td>Parents:</td><td>";
			$output = "";
			foreach($parents as $parent)
			{
				$output .= "<a href='?page=sim&sim=$parent'>$parent</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->children != "")
		{
			$children = str_getcsv($this->children);
			echo "<tr><td>Children:</td><td>";
			$output = "";
			foreach($children as $child)
			{
				$output .= "<a href='?page=sim&sim=$child'>$child</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->cats != "")
		{
			$cats = str_getcsv($this->cats);
			echo "<tr><td>Cats:</td><td>";
			$output = "";
			foreach($cats as $cat)
			{
				$output .= "<a href='?page=cat&cat=$cat'>$cat</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->dogs != "")
		{
			$dogs = str_getcsv($this->dogs);
			echo "<tr><td>Dogs:</td><td>";
			$output = "";
			foreach($dogs as $dog)
			{
				$output .= "<a href='?page=dog&dog=$dog'>$dog</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->grandchildren != "")
		{
			$grandchildren = str_getcsv($this->grandchildren);
			echo "<tr><td>Grandchildren:</td><td>";
			$output = "";
			foreach($grandchildren as $grandchild)
			{
				$output .= "<a href='?page=sim&sim=$grandchild'>$grandchild</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->spouses != "")
		{
			$spouses = str_getcsv($this->spouses);
			echo "<tr><td>Spouses:</td><td>";
			$output = "";
			foreach($spouses as $spouse)
			{
				$output .= "<a href='?page=sim&sim=$spouse'>$spouse</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->betrothed != "")
		{
			$betrothed = str_getcsv($this->betrothed);
			echo "<tr><td>Betrothed to:</td><td>";
			$output = "";
			foreach($betrothed as $betrothee)
			{
				$output .= "<a href='?page=sim&sim=$betrothee'>$betrothee</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->dating != "")
		{
			$dating = str_getcsv($this->dating);
			echo "<tr><td>Dating:</td><td>";
			$output = "";
			foreach($dating as $date)
			{
				$output .= "<a href='?page=sim&sim=$date'>$date</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->grandparents != "")
		{
			$grandparents = str_getcsv($this->grandparents);
			echo "<tr><td>Grandparents:</td><td>";
			$output = "";
			foreach($grandparents as $grandparent)
			{
				$output .= "<a href='?page=sim&sim=$grandparent'>$grandparent</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->niecesnephews != "")
		{
			$niecesnephews = str_getcsv($this->niecesnephews);
			echo "<tr><td>Nieces and nephews:</td><td>";
			$output = "";
			foreach($niecesnephews as $niecenephew)
			{
				$output .= "<a href='?page=sim&sim=$niecenephew'>$niecenephew</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->cousins != "")
		{
			$cousins = str_getcsv($this->cousins);
			echo "<tr><td>Cousins:</td><td>";
			$output = "";
			foreach($cousins as $cousin)
			{
				$output .= "<a href='?page=sim&sim=$cousin'>$cousin</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->auntsuncles != "")
		{
			$auntsuncles = str_getcsv($this->auntsuncles);
			echo "<tr><td>Aunts and uncles:</td><td>";
			$output = "";
			foreach($auntsuncles as $auntuncle)
			{
				$output .= "<a href='?page=sim&sim=$auntuncle'>$auntuncle</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		
		if($this->siblings != "")
		{
			$siblings = str_getcsv($this->siblings);
			echo "<tr><td>Siblings:</td><td>";
			$output = "";
			foreach($siblings as $sibling)
			{
				$output .= "<a href='?page=sim&sim=$sibling'>$sibling</a>,";
			}
			$output = rtrim($output,",");
			echo $output;
			echo "</td></tr>";
		}
		echo "</table>";
	}
	
	private function generateTraitDiagram($traitAmount)
	{
		return "<span class=\"traits\">"
		. str_repeat("|",$traitAmount)
		. "</span>"
		. str_repeat("|",10-$traitAmount);
	}
	
}
?>
