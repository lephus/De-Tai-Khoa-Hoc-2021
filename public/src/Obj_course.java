
public class Obj_course {
	public String id;
	public String title;
	public String author;
	public String overview;
	public String link;
	public String updated;
	public String is_disabled;
	public Obj_course(String id, String title, String author, String overview, String link, String updated,
			String is_disabled) {
		super();
		this.id = id;
		this.title = title;
		this.author = author;
		this.overview = overview;
		this.link = link;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_course [id=" + id + ", title=" + title + ", author=" + author + ", overview=" + overview + ", link="
				+ link + ", updated=" + updated + ", is_disabled=" + is_disabled + "]";
	}
	
}
