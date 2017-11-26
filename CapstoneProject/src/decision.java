import java.io.*;
import java.util.HashMap;
import java.util.Stack;

public class decision {
	public static void main(String[] args) throws FileNotFoundException
    {
		HashMap<String, Integer> map = new HashMap<String, Integer>();
		map.put("소고기", 1);
		map.put("닭고기", 1);
		map.put("초유", 1);
		map.put("오리고기", 1);
		map.put("동물성_지방_및_오일", 1);
		map.put("싱싱한_고기", 1);
		map.put("양고기", 1);
		map.put("간", 1);
		map.put("돼지고기", 1);
		map.put("토끼고기", 1);
		map.put("계란", 1);
		map.put("양", 1);
		map.put("천엽", 1);
		map.put("칠면조고기", 1);
		map.put("사슴고기", 1);
		
		map.put("골분", 0);
		map.put("가수분해물", 0);
		map.put("가수분해_단백질", 0);
		map.put("가금류", 0);
		map.put("가금류_지방", 0);
		map.put("보리", 0);
		map.put("귀리", 0);
		map.put("흰_쌀", 0);
		map.put("사탕수수", 0);
		map.put("스펠트밀", 0);
		map.put("스펠트밀_단백질", 0);
		
		map.put("유제품", -1);
		map.put("밀", -1);
		map.put("완두콩_단백질", -1);
		map.put("감자_단백질", -1);
		map.put("식물성_단백질_추출물", -1);
		map.put("황산구리", -1);
		map.put("아_셀렌_산_나트륨", -1);
		map.put("인공_방부제_및_산화_방지제", -1);
		map.put("카라기난", -1);
		map.put("EC_허용_첨가물", -1);
		map.put("인산", -1);
		
		map.put("옥수수", -1);
		map.put("대두박", -1);
		map.put("소맥", 0);
		map.put("옥글루텐", -1);
		map.put("정제계유", -1);
		map.put("계육분", -1);
		map.put("비타민", 1);
		map.put("미네랄", 1);
		map.put("닭고기", 1);
		map.put("고구마", 1);
		map.put("콩", -1);
		map.put("감자", 0);
		map.put("닭기름", -1);
		map.put("천연향미제", -1);
		map.put("연어", 1);
		map.put("올리고당", 1);
		map.put("곡물", -1);
		
		map.put("비특이성_면역증강제", -1);
		map.put("비타민_및_미네랄", 1);
		map.put("유기농_식물성_단백질", -1);
		map.put("유기농_쌀", -1);
		map.put("동물성_단백질_프리믹스", -1);
		
		BufferedReader Ingredient = new BufferedReader(new FileReader("test.txt"));
		String line;

        Stack<Integer> scorestack = new Stack<Integer>();

		try {
			//파일에 있는 모든 사료 조사
			while ((line = Ingredient.readLine()) != null) {
            	int i = 0;
                int temp = 0;
                int foodgrade = 0;
            	//한줄 읽어 line에 저장
            	//System.out.println(line);
            	//";"을 기준으로 성분을 나눠 ingredient배열에 저장
            	String[] ingredient = line.split(";");
            	
            	//하나의 사료 점수 계산 : 스택에 원료별 + - 0 push 후 pop하면서 곱한값 더해주기
            	//push part
                while(true) {
                	i++;
                	//System.out.print(ingredient[i]+"  ");
                	if(ingredient[i].equals(".")==true) {
                		System.out.println();
                		i=1;
                		break;
                		}
                	scorestack.push(map.get(ingredient[i]));
                	}
                //pop part
                while(!scorestack.isEmpty()) {
                	temp = (int)scorestack.pop();
                    foodgrade += temp*i;
                	//System.out.println("i="+i+",score="+temp*i+"total="+foodgrade);
                    i++;
                    }
                System.out.println("score =" + foodgrade);
                }
			} 
		catch (FileNotFoundException e) {
			e.printStackTrace();
			}
		
        catch (IOException e) {
        	e.printStackTrace();
        	}
		finally {
			if(Ingredient != null) try {Ingredient.close();
            } 
            catch (IOException e) {
            	
            }
        }
    }
	}
