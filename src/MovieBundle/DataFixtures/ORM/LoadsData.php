<?php

namespace MovieBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MovieBundle\Entity\OutputYear;

class LoadsData implements FixtureInterface {

    public function load(ObjectManager $manager) {
        $array = array('1930'=>"1930", '1931'=>"1931", '1932'=>"1932", '1933'=>"1933", '1934'=>"1934", '1935'=>"1935", '1936'=>"1936", '1937'=>"1937", '1938'=>"1938", '1939'=>"1939", '1940'=>"1940", '1941'=>"1941", '1942'=>"1942", '1943'=>"1943", '1944'=>"1944", '1945'=>"1945", '1946'=>"1946", '1947'=>"1947", '1948'=>"1948", '1949'=>"1949", '1950'=>"1950", '1951'=>"1951", '1952'=>"1952", '1953'=>"1953", '1954'=>"1954", '1955'=>"1955", '1956'=>"1956", '1957'=>"1957", '1958'=>"1958", '1959'=>"1959", '1960'=>"1960", '1961'=>"1961", '1962'=>"1962", '1963'=>"1963", '1964'=>"1964", '1965'=>"1965", '1966'=>"1966", '1967'=>"1967", '1968'=>"1968", '1969'=>"1969", '1970'=>"1970", '1971'=>"1971", '1972'=>"1972", '1973'=>"1973", '1974'=>"1974", '1975'=>"1975", '1976'=>"1976", '1977'=>"1977", '1978'=>"1978", '1979'=>"1979", '1980'=>"1980", '1981'=>"1981", '1982'=>"1982", '1983'=>"1983", '1984'=>"1984", '1985'=>"1985", '1986'=>"1986", '1987'=>"1987", '1988'=>"1988", '1989'=>"1989", '1990'=>"1990", '1991'=>"1991", '1992'=>"1992", '1993'=>"1993", '1994'=>"1994", '1995'=>"1995", '1996'=>"1996", '1997'=>"1997", '1998'=>"1998", '1999'=>"1999", '2000'=>"2000", '2001'=>"2001", '2002'=>"2002", '2003'=>"2003", '2004'=>"2004", '2005'=>"2005", '2006'=>"2006", '2007'=>"2007", '2008'=>"2008", '2009'=>"2009", '2010'=>"2010", '2011'=>"2011", '2012'=>"2012", '2013'=>"2013", '2014'=>"2014", '2015'=>"2015");
        $array2 = array("cheery", "lively");

      

        foreach ($array as $value) {
            $YearsEntity = new OutputYear();
            $YearsEntity->setYear($value);
            $manager->persist($YearsEntity);
            $manager->flush();
        }
      
    }

}
